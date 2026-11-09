<?php

namespace App\Data;

/** Static demo data until MySQL + live feeds are connected. */
final class PrototypeData
{
    public static function siteConfig(): array
    {
        return [
            'mode' => 'monitoring',
            'eas_message' => 'Moderate thunderstorm watch — Southern Ghana (GMet CAP)',
            'eas_severity' => 'moderate',
            'hero_title' => 'National emergency monitoring — Ghana',
            'hero_region' => 'Greater Accra · Ashanti · Volta',
            'hero_date' => '21 Oct 2026',
            'hero_note' => 'Independent information service. Verify all critical actions with NADMO, GMet, and official sources.',
        ];
    }

    public static function activeAlerts(): array
    {
        return [
            [
                'id' => 'cap-001',
                'title' => 'CAUTION: Thunderstorms anticipated over Southern Ghana',
                'severity' => 'moderate',
                'urgency' => 'expected',
                'areas' => ['Volta', 'Greater Accra', 'Eastern', 'Central', 'Ashanti'],
                'onset' => '2026-03-14 09:00',
                'expires' => '2026-03-14 14:00',
                'instruction' => 'Seek shelter indoors when thunder is heard. Slow down if driving.',
                'source' => 'Ghana Meteorological Agency (CAP)',
                'source_url' => 'https://www.meteo.gov.gh/alerts/',
            ],
            [
                'id' => 'cap-002',
                'title' => 'Advisory: Heavy rain possible — Northern transition belt',
                'severity' => 'minor',
                'urgency' => 'future',
                'areas' => ['Bono East', 'Ahafo', 'Savannah'],
                'onset' => '2026-03-15 15:00',
                'expires' => '2026-03-15 22:00',
                'instruction' => 'Avoid low-lying areas near rivers after dark.',
                'source' => 'Ghana Meteorological Agency (CAP)',
                'source_url' => 'https://www.meteo.gov.gh/alerts/',
            ],
        ];
    }

    public static function regionMap(): array
    {
        return [
            ['code' => 'GR', 'name' => 'Greater Accra', 'lat' => 5.6037, 'lng' => -0.1870],
            ['code' => 'AS', 'name' => 'Ashanti', 'lat' => 6.7470, 'lng' => -1.5209],
            ['code' => 'VO', 'name' => 'Volta', 'lat' => 6.5781, 'lng' => 0.4502],
            ['code' => 'EA', 'name' => 'Eastern', 'lat' => 6.0882, 'lng' => -0.2599],
            ['code' => 'CE', 'name' => 'Central', 'lat' => 5.1315, 'lng' => -1.2795],
            ['code' => 'WE', 'name' => 'Western', 'lat' => 5.0570, 'lng' => -1.7603],
            ['code' => 'NO', 'name' => 'Northern', 'lat' => 9.4075, 'lng' => -0.8534],
            ['code' => 'UE', 'name' => 'Upper East', 'lat' => 10.7082, 'lng' => -0.9853],
            ['code' => 'UW', 'name' => 'Upper West', 'lat' => 10.0601, 'lng' => -2.5090],
            ['code' => 'BO', 'name' => 'Bono', 'lat' => 7.5900, 'lng' => -2.4500],
            ['code' => 'BE', 'name' => 'Bono East', 'lat' => 7.7500, 'lng' => -1.0500],
            ['code' => 'AH', 'name' => 'Ahafo', 'lat' => 7.0000, 'lng' => -2.3000],
            ['code' => 'OT', 'name' => 'Oti', 'lat' => 7.9000, 'lng' => 0.3000],
            ['code' => 'SA', 'name' => 'Savannah', 'lat' => 9.0833, 'lng' => -1.8167],
            ['code' => 'NE', 'name' => 'North East', 'lat' => 10.5167, 'lng' => -0.3667],
            ['code' => 'WN', 'name' => 'Western North', 'lat' => 6.2000, 'lng' => -2.8000],
        ];
    }

    public static function bulletins(): array
    {
        return [
            [
                'slug' => 'nadmo-flood-hotlines',
                'severity' => 'watch',
                'tag' => 'Preparedness',
                'time' => '18 Mar 2026',
                'source' => 'NADMO / Graphic Online',
                'title' => 'NADMO urges public to save toll-free 112 for flood emergencies',
                'excerpt' => 'Heavy rains continue across several regions. NADMO lines remain open 24/7.',
                'body' => 'The National Disaster Management Organisation has reminded citizens to dial 112 for disaster-related emergencies and to report flooding or fallen trees immediately. Always confirm details with official NADMO channels.',
                'url' => 'https://www.graphic.com.gh/',
            ],
            [
                'slug' => 'gha-kumasi-ejura-closure',
                'severity' => 'danger',
                'tag' => 'Roads',
                'time' => '11 Jun 2026',
                'source' => 'Ghana Highway Authority',
                'title' => 'Temporary closure: Kumasi–Ejura road at Sataso',
                'excerpt' => 'Diversion via Mampong–Kofiase–Anyinasu–Sekyeredumase–Aframso.',
                'body' => 'GHA announced a temporary closure following washout damage. Motorists should plan extra travel time. See the Roads page for diversion details.',
                'url' => 'https://www.highways.gov.gh/',
            ],
            [
                'slug' => 'gmet-thunderstorm-south',
                'severity' => 'watch',
                'tag' => 'Weather',
                'time' => '14 Mar 2026',
                'source' => 'GMet',
                'title' => 'Thunderstorms anticipated over southern Ghana',
                'excerpt' => 'Moderate severity CAP alert — Volta to Ashanti corridor.',
                'body' => 'Official CAP alert from GMet. Instructions include seeking indoor shelter and reducing speed when driving in rain.',
                'url' => 'https://www.meteo.gov.gh/alerts/caution-thunderstorms-anticipated-over-southern-ghana/',
            ],
            [
                'slug' => 'harmattan-fire-awareness',
                'severity' => 'info',
                'tag' => 'Fire',
                'time' => '2 Jan 2026',
                'source' => 'NADMO',
                'title' => 'Harmattan season: bushfire preparedness advisory',
                'excerpt' => 'Avoid open burning near dry vegetation and report outbreaks early.',
                'body' => 'Seasonal advisory aligned with NADMO preparedness guidance. Avoid open burning near dry vegetation during Harmattan.',
                'url' => 'https://nadmo.gov.gh/',
            ],
        ];
    }

    public static function bulletin(string $slug): ?array
    {
        foreach (self::bulletins() as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }

        return null;
    }

    public static function roads(): array
    {
        return [
            [
                'route' => 'Kumasi – Ejura (N6)',
                'region' => 'Ashanti',
                'status' => 'closed',
                'reason' => 'Section washed away at Sataso after heavy rain',
                'diversion' => 'Kumasi → Mampong → Kofiase → Anyinasu → Sekyeredumase → Aframso → Ejura',
                'updated' => '11 Jun 2026',
                'source' => 'Ghana Highway Authority',
                'source_url' => 'https://www.highways.gov.gh/',
            ],
            [
                'route' => 'Accra – Tema Motorway (N1)',
                'region' => 'Greater Accra',
                'status' => 'restricted',
                'reason' => 'Lane reduction for Tetteh Quarshie interchange works',
                'diversion' => 'Follow temporary signage; expect delays peak hours',
                'updated' => '9 Mar 2026',
                'source' => 'Ghana Highway Authority',
                'source_url' => 'https://www.highways.gov.gh/',
            ],
            [
                'route' => 'Tamale – Bolgatanga (N10)',
                'region' => 'Northern',
                'status' => 'open',
                'reason' => 'Passable with caution — occasional slow traffic at works zone',
                'diversion' => 'None',
                'updated' => '20 Oct 2026',
                'source' => 'Ghana Highway Authority',
                'source_url' => 'https://www.highways.gov.gh/',
            ],
        ];
    }

    public static function situation(): array
    {
        return [
            'as_of' => '21 Oct 2026 — monitoring',
            'source_label' => 'NADMO',
            'source_url' => 'https://nadmo.gov.gh/',
            'metrics' => [
                ['label' => 'Active national emergency', 'value' => 'None declared', 'note' => 'Monitoring mode'],
                ['label' => 'Regions with weather watch', 'value' => '5', 'note' => 'GMet CAP'],
                ['label' => 'Road sections restricted', 'value' => '2', 'note' => 'Curated GHA notices'],
            ],
            'narrative' => 'When NADMO publishes verified figures during an event, they appear here with full citation. Unsourced casualty numbers are never displayed.',
        ];
    }

    public static function helplines(): array
    {
        return [
            ['category' => 'All emergencies', 'name' => 'National emergency', 'number' => '112', 'note' => 'Toll-free 24/7'],
            ['category' => 'Police', 'name' => 'Ghana Police Service', 'number' => '191', 'note' => 'Nationwide call centre'],
            ['category' => 'Medical', 'name' => 'National Ambulance', 'number' => '193', 'note' => 'Emergency medical'],
            ['category' => 'Disaster', 'name' => 'NADMO hotline', 'number' => '0302 964 884', 'note' => 'Flood & disaster reporting'],
            ['category' => 'Disaster', 'name' => 'NADMO hotline', 'number' => '0299 350 030', 'note' => 'Alternate line'],
            ['category' => 'Fire', 'name' => 'Ghana Fire Service', 'number' => '192', 'note' => 'Fire & rescue'],
        ];
    }

    public static function missingPersons(): array
    {
        return [
            [
                'id' => 'MP-001',
                'name' => 'Kwame A.',
                'age' => 34,
                'region' => 'Greater Accra',
                'last_seen' => '15 Oct 2026',
                'status' => 'verified',
                'event' => 'Listed per verified community report — dial 191 for emergencies',
            ],
            [
                'id' => 'MP-002',
                'name' => 'Ama S.',
                'age' => 12,
                'region' => 'Volta',
                'last_seen' => '10 Oct 2026',
                'status' => 'verified',
                'event' => 'Listed per verified community report — dial 191 for emergencies',
            ],
        ];
    }

    public static function weatherCities(): array
    {
        return [
            ['name' => 'Accra', 'lat' => 5.6037, 'lng' => -0.1870],
            ['name' => 'Kumasi', 'lat' => 6.6885, 'lng' => -1.6244],
            ['name' => 'Tamale', 'lat' => 9.4034, 'lng' => -0.8424],
            ['name' => 'Takoradi', 'lat' => 4.8845, 'lng' => -1.7554],
            ['name' => 'Ho', 'lat' => 6.6119, 'lng' => 0.4708],
            ['name' => 'Bolgatanga', 'lat' => 10.7856, 'lng' => -0.8514],
            ['name' => 'Wa', 'lat' => 10.0601, 'lng' => -2.5090],
            ['name' => 'Cape Coast', 'lat' => 5.1053, 'lng' => -1.2466],
            ['name' => 'Sunyani', 'lat' => 7.3399, 'lng' => -2.3268],
            ['name' => 'Koforidua', 'lat' => 6.0940, 'lng' => -0.2570],
        ];
    }

    public static function forecastSample(): array
    {
        return [
            ['day' => 'Today', 'hi' => 31, 'lo' => 24, 'rain' => 65, 'wx' => 'Thunderstorms'],
            ['day' => 'Tue', 'hi' => 30, 'lo' => 23, 'rain' => 40, 'wx' => 'Cloudy'],
            ['day' => 'Wed', 'hi' => 32, 'lo' => 24, 'rain' => 20, 'wx' => 'Partly cloudy'],
            ['day' => 'Thu', 'hi' => 31, 'lo' => 23, 'rain' => 55, 'wx' => 'Rain showers'],
            ['day' => 'Fri', 'hi' => 30, 'lo' => 22, 'rain' => 30, 'wx' => 'Cloudy'],
        ];
    }

    public static function historyChart(): array
    {
        return [
            'labels' => ['2019', '2020', '2021', '2022', '2023', '2024'],
            'floods' => [12, 18, 15, 22, 19, 24],
            'storms' => [28, 31, 29, 35, 33, 38],
            'source' => 'Source: DesInventar Ghana / EM-DAT (aggregated historical records)',
        ];
    }

    public static function reliefResources(): array
    {
        return [
            ['title' => 'Before floods', 'items' => ['Know your assembly evacuation point', 'Keep NADMO 112 saved', 'Avoid driving through flooded roads']],
            ['title' => 'Official channels', 'items' => ['NADMO — disaster coordination', 'GMet — weather warnings', 'Ghana Police — security & missing persons']],
        ];
    }

    public static function lastCapIngestLabel(): string
    {
        return '12 min ago';
    }

    public static function draftBulletinCount(): int
    {
        return 1;
    }

    /** @return list<array<string, mixed>> */
    public static function pendingMissingSubmissions(): array
    {
        return [
            [
                'id' => 'SUB-101',
                'name' => 'Yaw Mensah',
                'age' => 28,
                'region' => 'Greater Accra',
                'last_seen' => 'Odorkor, 18 Oct 2026 — evening market',
                'phone' => '024***',
                'status' => 'pending',
                'submitted_at' => '19 Oct 2026 09:14',
            ],
            [
                'id' => 'SUB-102',
                'name' => 'Efua Koranteng',
                'age' => 45,
                'region' => 'Ashanti',
                'last_seen' => 'Adum, Kumasi, 17 Oct 2026',
                'phone' => '055***',
                'status' => 'pending',
                'submitted_at' => '18 Oct 2026 16:40',
            ],
        ];
    }

    /** @return list<array<string, mixed>> */
    public static function incidentReports(): array
    {
        return [
            [
                'id' => 'INC-9001',
                'type' => 'Flooding',
                'region' => 'Greater Accra',
                'location' => 'Weija-Gbawe lowlands',
                'description' => 'Water rising near main road — vehicles stranded.',
                'status' => 'pending',
                'submitted_at' => '21 Oct 2026 07:20',
            ],
        ];
    }

    /** @return list<string> */
    public static function ghanaRegions(): array
    {
        return [
            'Greater Accra', 'Ashanti', 'Volta', 'Eastern', 'Central', 'Western', 'Western North',
            'Northern', 'North East', 'Savannah', 'Upper East', 'Upper West', 'Bono', 'Bono East',
            'Ahafo', 'Oti',
        ];
    }

    /** @return array<string, list<array{day:string,hi:int,lo:int,rain:int,wx:string}>> */
    public static function forecastsByCity(): array
    {
        $base = self::forecastSample();

        return [
            'Accra' => $base,
            'Kumasi' => [
                ['day' => 'Today', 'hi' => 29, 'lo' => 21, 'rain' => 55, 'wx' => 'Rain showers'],
                ['day' => 'Tue', 'hi' => 28, 'lo' => 20, 'rain' => 45, 'wx' => 'Cloudy'],
                ['day' => 'Wed', 'hi' => 30, 'lo' => 21, 'rain' => 30, 'wx' => 'Partly cloudy'],
                ['day' => 'Thu', 'hi' => 29, 'lo' => 20, 'rain' => 60, 'wx' => 'Thunderstorms'],
                ['day' => 'Fri', 'hi' => 28, 'lo' => 20, 'rain' => 35, 'wx' => 'Cloudy'],
            ],
            'Tamale' => [
                ['day' => 'Today', 'hi' => 35, 'lo' => 24, 'rain' => 15, 'wx' => 'Hot & hazy'],
                ['day' => 'Tue', 'hi' => 36, 'lo' => 25, 'rain' => 20, 'wx' => 'Isolated storms'],
                ['day' => 'Wed', 'hi' => 34, 'lo' => 24, 'rain' => 25, 'wx' => 'Cloudy'],
                ['day' => 'Thu', 'hi' => 33, 'lo' => 23, 'rain' => 40, 'wx' => 'Rain showers'],
                ['day' => 'Fri', 'hi' => 34, 'lo' => 24, 'rain' => 20, 'wx' => 'Partly cloudy'],
            ],
            'Takoradi' => [
                ['day' => 'Today', 'hi' => 30, 'lo' => 24, 'rain' => 70, 'wx' => 'Thunderstorms'],
                ['day' => 'Tue', 'hi' => 29, 'lo' => 23, 'rain' => 50, 'wx' => 'Rain showers'],
                ['day' => 'Wed', 'hi' => 31, 'lo' => 24, 'rain' => 35, 'wx' => 'Cloudy'],
                ['day' => 'Thu', 'hi' => 30, 'lo' => 23, 'rain' => 45, 'wx' => 'Rain showers'],
                ['day' => 'Fri', 'hi' => 30, 'lo' => 24, 'rain' => 30, 'wx' => 'Partly cloudy'],
            ],
            'Ho' => [
                ['day' => 'Today', 'hi' => 31, 'lo' => 23, 'rain' => 60, 'wx' => 'Thunderstorms'],
                ['day' => 'Tue', 'hi' => 30, 'lo' => 22, 'rain' => 40, 'wx' => 'Cloudy'],
                ['day' => 'Wed', 'hi' => 31, 'lo' => 23, 'rain' => 25, 'wx' => 'Partly cloudy'],
                ['day' => 'Thu', 'hi' => 30, 'lo' => 22, 'rain' => 50, 'wx' => 'Rain showers'],
                ['day' => 'Fri', 'hi' => 30, 'lo' => 22, 'rain' => 30, 'wx' => 'Cloudy'],
            ],
            'Bolgatanga' => [
                ['day' => 'Today', 'hi' => 34, 'lo' => 23, 'rain' => 25, 'wx' => 'Storms north'],
                ['day' => 'Tue', 'hi' => 33, 'lo' => 22, 'rain' => 30, 'wx' => 'Cloudy'],
                ['day' => 'Wed', 'hi' => 35, 'lo' => 23, 'rain' => 15, 'wx' => 'Hot sun'],
                ['day' => 'Thu', 'hi' => 34, 'lo' => 22, 'rain' => 35, 'wx' => 'Rain showers'],
                ['day' => 'Fri', 'hi' => 33, 'lo' => 22, 'rain' => 20, 'wx' => 'Partly cloudy'],
            ],
            'Wa' => [
                ['day' => 'Today', 'hi' => 33, 'lo' => 22, 'rain' => 20, 'wx' => 'Hazy'],
                ['day' => 'Tue', 'hi' => 34, 'lo' => 23, 'rain' => 25, 'wx' => 'Cloudy'],
                ['day' => 'Wed', 'hi' => 32, 'lo' => 21, 'rain' => 30, 'wx' => 'Rain showers'],
                ['day' => 'Thu', 'hi' => 33, 'lo' => 22, 'rain' => 25, 'wx' => 'Cloudy'],
                ['day' => 'Fri', 'hi' => 34, 'lo' => 23, 'rain' => 15, 'wx' => 'Partly cloudy'],
            ],
            'Cape Coast' => [
                ['day' => 'Today', 'hi' => 30, 'lo' => 24, 'rain' => 65, 'wx' => 'Thunderstorms'],
                ['day' => 'Tue', 'hi' => 29, 'lo' => 23, 'rain' => 45, 'wx' => 'Cloudy'],
                ['day' => 'Wed', 'hi' => 30, 'lo' => 24, 'rain' => 30, 'wx' => 'Partly cloudy'],
                ['day' => 'Thu', 'hi' => 29, 'lo' => 23, 'rain' => 55, 'wx' => 'Rain showers'],
                ['day' => 'Fri', 'hi' => 29, 'lo' => 23, 'rain' => 35, 'wx' => 'Cloudy'],
            ],
            'Sunyani' => [
                ['day' => 'Today', 'hi' => 29, 'lo' => 21, 'rain' => 40, 'wx' => 'Cloudy'],
                ['day' => 'Tue', 'hi' => 28, 'lo' => 20, 'rain' => 35, 'wx' => 'Rain showers'],
                ['day' => 'Wed', 'hi' => 30, 'lo' => 21, 'rain' => 25, 'wx' => 'Partly cloudy'],
                ['day' => 'Thu', 'hi' => 29, 'lo' => 20, 'rain' => 45, 'wx' => 'Thunderstorms'],
                ['day' => 'Fri', 'hi' => 28, 'lo' => 20, 'rain' => 30, 'wx' => 'Cloudy'],
            ],
            'Koforidua' => [
                ['day' => 'Today', 'hi' => 30, 'lo' => 22, 'rain' => 50, 'wx' => 'Rain showers'],
                ['day' => 'Tue', 'hi' => 29, 'lo' => 21, 'rain' => 40, 'wx' => 'Cloudy'],
                ['day' => 'Wed', 'hi' => 31, 'lo' => 22, 'rain' => 25, 'wx' => 'Partly cloudy'],
                ['day' => 'Thu', 'hi' => 30, 'lo' => 21, 'rain' => 55, 'wx' => 'Thunderstorms'],
                ['day' => 'Fri', 'hi' => 29, 'lo' => 21, 'rain' => 35, 'wx' => 'Cloudy'],
            ],
        ];
    }

    /** @return list<array<string, string>> */
    public static function situationTimeline(): array
    {
        return [
            ['time' => '21 Oct 2026 08:00', 'text' => 'GMet CAP: moderate thunderstorm watch for southern regions.', 'source' => 'GMet'],
            ['time' => '20 Oct 2026 18:30', 'text' => 'GHA: Accra–Tema Motorway lane restrictions remain in effect.', 'source' => 'GHA'],
            ['time' => '18 Oct 2026 11:00', 'text' => 'NADMO: public reminded to use toll-free 112 for flood reporting.', 'source' => 'NADMO'],
        ];
    }

    /** @return array<string, array{labels:list<string>,floods:list<int>,storms:list<int>}> */
    public static function historyDatasets(): array
    {
        return [
            'all' => self::historyChart(),
            'greater_accra' => [
                'labels' => ['2019', '2020', '2021', '2022', '2023', '2024'],
                'floods' => [4, 6, 5, 8, 7, 9],
                'storms' => [9, 10, 8, 12, 11, 13],
                'source' => 'Greater Accra — DesInventar / EM-DAT subset',
            ],
            'northern' => [
                'labels' => ['2019', '2020', '2021', '2022', '2023', '2024'],
                'floods' => [2, 3, 4, 5, 4, 6],
                'storms' => [14, 16, 15, 18, 17, 20],
                'source' => 'Northern belt — DesInventar / EM-DAT subset',
            ],
        ];
    }

    public static function adminStats(): array
    {
        return [
            'last_cap_ingest' => self::lastCapIngestLabel(),
            'active_alerts' => count(self::activeAlerts()),
            'pending_missing' => count(self::pendingMissingSubmissions()),
            'draft_bulletins' => self::draftBulletinCount(),
        ];
    }
}
