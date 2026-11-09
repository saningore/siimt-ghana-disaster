<?php

namespace App\Data;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

/** Session-backed demo persistence (no database required). */
final class DemoStore
{
    private const NS = 'ghana_demo';

    public static function config(): array
    {
        $defaults = PrototypeData::siteConfig();
        $overrides = Session::get(self::NS.'.config', []);

        return array_merge($defaults, array_filter($overrides, fn ($v) => $v !== null && $v !== ''));
    }

    public static function saveConfig(array $data): void
    {
        Session::put(self::NS.'.config', array_merge(Session::get(self::NS.'.config', []), $data));
    }

    public static function initMissingQueues(): void
    {
        if (Session::get(self::NS.'.missing_initialized')) {
            return;
        }

        Session::put(self::NS.'.missing_pending', PrototypeData::pendingMissingSubmissions());
        Session::put(self::NS.'.missing_verified_extra', []);
        Session::put(self::NS.'.missing_initialized', true);
    }

    /** @return list<array<string, mixed>> */
    public static function pendingMissing(): array
    {
        self::initMissingQueues();

        return array_values(array_filter(
            Session::get(self::NS.'.missing_pending', []),
            fn ($row) => ($row['status'] ?? 'pending') === 'pending'
        ));
    }

    public static function addMissingSubmission(array $data): string
    {
        self::initMissingQueues();
        $id = 'SUB-'.strtoupper(Str::random(6));
        $row = [
            'id' => $id,
            'name' => $data['name'],
            'age' => $data['age'] ?? null,
            'region' => $data['region'],
            'last_seen' => $data['last_seen'],
            'phone' => $data['phone'],
            'status' => 'pending',
            'submitted_at' => now()->format('d M Y H:i'),
        ];

        $pending = Session::get(self::NS.'.missing_pending', []);
        $pending[] = $row;
        Session::put(self::NS.'.missing_pending', $pending);

        return $id;
    }

    public static function approveMissing(string $id): bool
    {
        self::initMissingQueues();
        $pending = Session::get(self::NS.'.missing_pending', []);
        $found = null;
        $remaining = [];

        foreach ($pending as $row) {
            if ($row['id'] === $id && ($row['status'] ?? '') === 'pending') {
                $found = $row;
                continue;
            }
            $remaining[] = $row;
        }

        if ($found === null) {
            return false;
        }

        Session::put(self::NS.'.missing_pending', $remaining);
        $verified = Session::get(self::NS.'.missing_verified_extra', []);
        $verified[] = [
            'id' => 'MP-'.strtoupper(Str::random(4)),
            'name' => $found['name'],
            'age' => $found['age'] ?? '—',
            'region' => $found['region'],
            'last_seen' => Str::limit($found['last_seen'], 40),
            'status' => 'verified',
            'event' => 'Approved from public report '.$found['id'],
        ];
        Session::put(self::NS.'.missing_verified_extra', $verified);

        return true;
    }

    public static function rejectMissing(string $id): bool
    {
        self::initMissingQueues();
        $pending = Session::get(self::NS.'.missing_pending', []);
        $updated = false;

        foreach ($pending as &$row) {
            if ($row['id'] === $id && ($row['status'] ?? '') === 'pending') {
                $row['status'] = 'rejected';
                $updated = true;
            }
        }
        unset($row);

        if ($updated) {
            Session::put(self::NS.'.missing_pending', $pending);
        }

        return $updated;
    }

    /** @return list<array<string, mixed>> */
    public static function verifiedMissing(): array
    {
        self::initMissingQueues();

        return array_merge(
            PrototypeData::missingPersons(),
            Session::get(self::NS.'.missing_verified_extra', [])
        );
    }

    /** @return list<array<string, mixed>> */
    public static function incidents(): array
    {
        if (! Session::has(self::NS.'.incidents')) {
            Session::put(self::NS.'.incidents', PrototypeData::incidentReports());
        }

        return Session::get(self::NS.'.incidents', []);
    }

    public static function addIncident(array $data): string
    {
        $id = 'INC-'.strtoupper(Str::random(5));
        $list = self::incidents();
        $list[] = [
            'id' => $id,
            'type' => $data['type'],
            'region' => $data['region'],
            'location' => $data['location'],
            'description' => $data['description'],
            'status' => 'pending',
            'submitted_at' => now()->format('d M Y H:i'),
        ];
        Session::put(self::NS.'.incidents', $list);

        return $id;
    }

    public static function adminStats(): array
    {
        return [
            'last_cap_ingest' => PrototypeData::lastCapIngestLabel(),
            'active_alerts' => count(PrototypeData::activeAlerts()),
            'pending_missing' => count(self::pendingMissing()),
            'draft_bulletins' => PrototypeData::draftBulletinCount(),
            'pending_incidents' => count(array_filter(self::incidents(), fn ($i) => ($i['status'] ?? '') === 'pending')),
        ];
    }
}
