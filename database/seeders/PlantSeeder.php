<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            [
                'name' => 'Aegagropila linnaei',
                'type' => 'Moss',
                'origin' => 'Japan, Ostasien, Osteuropa',
                'family' => ' Pithophoraceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low - High',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '6 - 8.5',
                'temperature' => '10 - 26',
                'growth_height' => '3 - 10',
                'growth_width' => ' 3 - 10',
                'demands' => 'Easy',
                'description' => 'Cladophora aegagropila is not really a plant, but a ball of algae from 3-10 cm wide. It is a decorative exception from the rule about avoiding algae at all costs. It is normally found in shallow lakes, where the movement of the waves forms it into a sphere. In an aquarium it must be turned regularly to keep it in shape. Cladophora aegagrophila can be divided into smaller pieces, which become spherical with time, or which form a carpet, if attached to roots and stones. Protected in parts of Japan.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Alternanthera reineckii "Mini"',
                'type' => 'Stem',
                'origin' => 'Cultivar',
                'family' => 'Amaranthaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Medium',
                'co2_demand' => 'Medium',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5 - 8',
                'temperature' => '10 - 30',
                'growth_height' => '5 - 30',
                'growth_width' => '5 - 10',
                'demands' => 'Medium',
                'description' => 'This miniature version of the well-known Alternanthera is characterized by compact growth and a slower growth rate. It is particularly suitable for small aquariums or as a foreground plant in larger aquascapes. By careful trimming, it is possible to create a dense, red violet carpet of approximately 5 to 10 cm height. High light intensity and addition of CO2 improves the plants growth and overall appearance. ',
                'created_at' => new DateTime()
            ],
            // [
            //     //test1 
            //     'name' => 'Alternanthera reineckii "Roseafolia"',
            //     'type' => 'Stem',
            //     'origin' => 'South America',
            //     'family' => 'Amaranthaceae',
            //     'growt_rate' => 'Medium',
            //     'light_demand' => 'Medium - High',
            //     'co2_demand' => 'Medium',
            //     'hardness_tolerance' => 'Soft - Hard',
            //     'placement_area' => 'Midground',
            //     'ph_tolerance' => '5 - 8',
            //     'temperature' => '17 - 28',
            //     'growth_height' => '25 - 50',
            //     'growth_width' => '10 - 15',
            //     'demands' => 'Medium',
            //     'description' => 'The purple colour underneath Alternanthera reineckii "roseafolia"
            //     leaves provides an effective contrast to the many green plants in an aquarium -
            //     particularly when planted in groups. Good light encourages the leaves to turn
            //     red. Most Alternanthera species are difficult to grow, but this one is
            //     relatively undemanding. Easy to propagate by nipping off the terminal bud and
            //     planting it in the bottom. This also makes the mother plant more bushy, because
            //     more side shoots are formed.',
            //     'created_at' => new DateTime()
            // ],
            [
                'name' => 'Anubias barteri caladiifolia',
                'type' => 'Rhizome',
                'origin' => 'West Africa',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low - High',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '20 - 30',
                'growth_height' => '10 - 40',
                'growth_width' => '10 - 40',
                'demands' => 'Easy',
                'description' => 'It is characteristic that the leaves arch considerably between the leaf ribs, and the new leaves are red-brown. The colour combination and leaf shape make it an attractive variety in both large and small aquariums. It flowers frequently under water but does not produce seeds there.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Anubias barteri "Coffeifolia"',
                'type' => 'Rhizome',
                'origin' => 'Cultivar',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low - High',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5.5 - 9',
                'temperature' => '20 - 30',
                'growth_height' => '15 - 25',
                'growth_width' => '5 - 10',
                'demands' => 'Easy',
                'description' => 'Anubias barteri "coffeefolia" is a very beautiful, low variety of
                Anubias barteri. It is characteristic that the leaves arch considerably
                between the leaf ribs, and the new leaves are red-brown. The colour combination
                and leaf shape make it an attractive variety in both large and small aquariums.
                It flowers frequently under water but does not produce seeds there. Anubias
                species seem to grow so slowly that they do not realise that they have been
                submerged. It is not eaten by herbivorous fish.',
                'created_at' => new DateTime()
            ],
            [
                //test2
                'name' => 'Anubias barteri "Petite"',
                'type' => 'Rhizome',
                'origin' => 'Cultivar',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low - High',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '6 - 8',
                'temperature' => '20 - 30',
                'growth_height' => '20 - 30',
                'growth_width' => '5 - 10',
                'demands' => 'Easy',
                'description' => 'A mutation which appeared in cultivation at the Oriental aquarium plant
                nursery in Singapore. Grows very slowly, and can be difficult to keep in healthy
                growth. It is most decorative when attached to stones or roots, and like other
                Anubias should be attached with fishing line until it gains a hold. A speciality
                plant which is ideal for miniature landscapes in small aquariums.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Anubias barteri var. angustifolia',
                'type' => 'Rhizome',
                'origin' => 'Africa',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '12 - 30',
                'growth_height' => '10 - 15',
                'growth_width' => '10 - 15',
                'demands' => 'Easy',
                'description' => 'Anubias barteri var. angustifolia from West Africa is a beautiful plant with long, narrow leaves.

                10-20 cm tall with a rhizome, from which the leaves develop, that grows 10-15 cm or larger. Very easy to grow since it thrives in almost any conditions, although high light intensity should be avoided. Place it instead in shady positions under larger plants. If planted in the bottom, do not cover the rhizome, it tends to rot. It is not eaten by herbivorous fish. 
                
                Anubias barteri var. angustifolia used to be sold as Anubias afzelii, but the latter is actually a much larger species.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Anubias barteri var. barteri',
                'type' => 'Rhizome',
                'origin' => 'Africa',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5.5 - 9',
                'temperature' => '22 - 28',
                'growth_height' => '20 - 30',
                'growth_width' => '10 - 15',
                'demands' => 'Easy',
                'description' => 'Anubias barteri var. barteri from West Africa is an undemanding plant. It grows somewhat larger than Anubias barteri var. nana but is grown in the same conditions. From 25-45 cm tall and the creeping rhizome from 10-15 cm or more. Anubias barteri varies considerably in terms of size and leaf shape.

                Like other Anubias-species, it is best planted in a shady spot to minimize algae growth on the leaves. If planted on the bottom, the rhizome must not be covered because it tends to rot. It is also suitable for terrariums and paludariums. Herbivorous fish do not eat the very tough and robust leaves. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Anubias barteri var. nana',
                'type' => 'Rhizome',
                'origin' => 'Africa',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5.5 - 9',
                'temperature' => '12 - 30',
                'growth_height' => '5 - 15',
                'growth_width' => '5 - 20',
                'demands' => 'Easy',
                'description' => 'Anubias barteri var. nana is a small, attractive plant which thrives in all conditions.

                It originates from Cameroon and will reach 5-10 cm height. The rhizome will be 10-15 cm or more. It grows slowly, and the leaves survive for several years, giving slow-growing algae the chance to become established.
                
                The best result is achieved by planting on a stone or tree root. Fishing line can be used to attach the plant until it gains a hold. If planted on the bottom the rhizome must not be covered because it tends to rot. It flowers frequently under water. It is not eaten by herbivorous fish. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Anubias barteri var. nana "Golden',
                'type' => 'Rhizome',
                'origin' => 'Zuchtform',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5 - 9',
                'temperature' => '12 - 30',
                'growth_height' => '5 - 10',
                'growth_width' => '5 - 20',
                'demands' => 'Easy',
                'description' => 'This is another new variety of dwarf Anubias called "Gold". It was discovered during regular cultivation at a nursery in Taiwan. After the isolation period it took several years to establish a stable stock. With leaves ranging in colour from light green to yellow-gold it is significantly different from the other, darker green types of Anubias. Again, it does not do well in very low lighting as this makes the leaves turn a darker colour.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Anubias gracilis',
                'type' => 'Rhizome',
                'origin' => 'Africa',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground - Background',
                'ph_tolerance' => '5 - 7',
                'temperature' => '12 - 30',
                'growth_height' => '30 - 60',
                'growth_width' => '30 - 60',
                'demands' => 'Easy',
                'description' => 'Western Africa is home to several species of Anubias, including this one.

                The triangular leaves of 5-10 cm on long leaf-stems make Anubias gracilis one of the most elegant. It is hardy and tolerant, a very good beginner’s plant. The plant can grow on rock or wood or planted on the bottom. If planted in the bottom, the rhizome, from which leaves and roots appear, must not be covered. If it is, the whole plant will rot and die.
                
                Anubias gracilis can be allowed to grow out of the water, but will attain a significant size this way.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Aponogeton boivinianus',
                'type' => 'Bulb / Onion',
                'origin' => 'Africa',
                'family' => 'Aponogetonaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Medium',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Medium - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '6 - 8',
                'temperature' => '16 - 26',
                'growth_height' => '30 - 80',
                'growth_width' => '30 - 50',
                'demands' => 'Medium',
                'description' => 'Aponogeton boivinianus is a large, strong plant which is only suitable for large aquariums.

                A bulb plant from Madagascar, whose bulb may be covered with the bottom layer, as long as the sprout tip is at the soil surface. In favourable conditions it can form very large leaves (up to 80 cm long and 8 cm wide, and from 30-50 cm wide). The oldest leaves are deep dark-green, while younger leaves are light-green and sometimes brownish until they are fully developed. Nutrition capsules enhances the growth considerably.
                
                In the wild, Aponogeton boivinianus is found in fast-flowing water, and it prefers some flow in the aquarium water. It needs a dormant period when the bulb loses all its leaves, after which the growth will start again. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Aponogeton crispus',
                'type' => 'Bulb / Onion',
                'origin' => 'Asia',
                'family' => 'Aponogetonaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Medium',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground - Background',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '15 - 32',
                'growth_height' => '25 - 50',
                'growth_width' => '15 - 30',
                'demands' => 'Medium',
                'description' => 'Aponogeton crispus from Sri Lanka looks great in any aquarium with its light-green, wavy and transparent leaves. Leaves from 25-50 cm and the plant grows to 15-25 cm wide.

                It makes few demands, although growth is always best in soft, slightly acidic water with a nutritious bottom. In such conditions the plant produces a mass of leaves, and it flowers very frequently in optimum conditions. Aponogeton crispus is generally found in ponds that are only filled with water in the rainy season, but it does not need a dormant period in the aquarium.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Aponogeton longiplumulosus',
                'type' => 'Bulb / Onion',
                'origin' => 'Africa',
                'family' => 'Aponogetonaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Background',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '18 - 26',
                'growth_height' => '35 - 60',
                'growth_width' => '25 - 40',
                'demands' => 'Medium',
                'description' => 'Aponogeton longiplumulosus from Madagascar has large, fluted leaves (35-60 cm long), making it a wonderful plant which can be recommended for large aquariums (the whole plant becomes 25-40 cm wide).

                The bulb can be covered with the bottom layer, as long as the sprout tip is at the soil surface. It is relatively undemanding and makes no special demands on water quality. A Nutrition capsule placed under the bulb enhances the growth considerably. It also flowers frequently, making it a beautiful addition to any large open aquarium.
                
                It stops growing at regular intervals, but normally starts again after a few weeks of dormancy. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Aponogeton madagascariensis',
                'type' => 'Bulb / Onion',
                'origin' => 'Africa',
                'family' => 'Aponogetonaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Medium',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground - Background',
                'ph_tolerance' => '5.5 - 7.5',
                'temperature' => '15 - 26',
                'growth_height' => '35 - 60',
                'growth_width' => '25 - 50',
                'demands' => 'Medium',
                'description' => 'Aponogeton madagascariensis is a bulb plant from Madagascar and is a speciality in botanical gardens all over the world.

                The bulb can be covered with the bottom layer, as long as the sprout tip is at the soil surface. Aponogeton madagascariensis makes such high demands on water quality and the bottom that it can only be recommended as a solitary plant in large, specialised aquariums in which the water is replaced frequently. Nutrition capsules enhances the growth considerably.
                
                There are several varieties, with different structures and leaf widths, and sizes from 25-50 cm. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Aponogeton ulvaceus',
                'type' => 'Bulb / Onion',
                'origin' => 'Africa',
                'family' => ' Aponogetonaceae',
                'growt_rate' => 'Fast',
                'light_demand' => '20 - 30',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '20 - 27',
                'growth_height' => '30 - 50',
                'growth_width' => '30 - 35',
                'demands' => 'Medium',
                'description' => 'Aponogeton ulvaceus is one of the most beautiful bulb species in the Aponogeton-family and originates from Madagascar.

                The leaves are delicate light-green and transparent with fluted margin. A single root can produce more than 40 leaves, 30-60 cm long. This means that the plant is best as a solitary plant in large aquariums (the plant becomes up to 50 cm wide). It is relatively tolerant, and thrives in both soft and hard water, particularly if CO2 is added.
                
                There are many varieties of Aponogeton ulvaceus, some of which need a dormant period, when the root does not produce leaves.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Bacopa australis',
                'type' => 'Stem',
                'origin' => 'South America',
                'family' => 'Scrophulariaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Medium',
                'co2_demand' => 'Medium',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Foreground - Background',
                'ph_tolerance' => '6 - 8',
                'temperature' => '15 - 32',
                'growth_height' => '5 - 30',
                'growth_width' => '2 - 4',
                'demands' => 'Medium',
                'description' => 'Bacopa australis was discovered in southern Brazil (australis = southern), and it is not from Australia, as might otherwise be assumed from its name. Stems become 10-30 cm tall and 2-4 cm wide. Like the other Bacopa species, Bacopa australis is also easy to grow in an aquarium. Under certain conditions it creeps across the bottom to form an elegant and decorative light green cushion. When Bacopa australis grows in a good light, the leaves become reddish. It is easily propagated by taking side shoots and planting them in the substrate. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Bacopa caroliniana',
                'type' => 'Stem',
                'origin' => 'North America',
                'family' => 'Scrophulariaceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => '	Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '5 - 8',
                'temperature' => '15 - 28',
                'growth_height' => '20 - 30',
                'growth_width' => '3 - 6',
                'demands' => 'Easy',
                'description' => 'Bacopa caroliniana has been used as an aquarium plant for many years.
                Apart from relatively good light it makes few demands. Its slow growth rate
                makes it one of the few stem plants that do not need much attention. Like most
                stem plants, it is most decorative when planted in small groups. Easy to
                propagate by cuttings; take a side shoot and plant it in the bottom.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Bacopa monnieri "Compact"',
                'type' => 'Stem',
                'origin' => 'Cultivar',
                'family' => 'Scrophulariaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground - Background',
                'ph_tolerance' => '6 - 9',
                'temperature' => '15 - 30',
                'growth_height' => '3 - 10',
                'growth_width' => '3 - 5',
                'demands' => 'Easy',
                'description' => 'This culture form of the stem plant Bacopa Monnieri is more compact and, under good light conditions, almost a creeping plant. By pinching off all vertical growing shoots, the plant can maintain a low and close growth, since it willingly creates a large number of side shoots.

                Furthermore, the plant grows well in the shadow of other plants. Very suitable as a bit higher carpet – or bushy plant in the middle or front of the aquarium. The plant becomes more vertical growing and less compact without CO2 additive and decreased light conditions. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Blyxa japonica',
                'type' => 'Rosulate',
                'origin' => 'Asia',
                'family' => 'Hydrocharitaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Medium - High',
                'co2_demand' => 'Medium',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Foreground - Midground',
                'ph_tolerance' => '5.5 - 7.5',
                'temperature' => '22 - 28',
                'growth_height' => '10 - 20',
                'growth_width' => '5 - 10',
                'demands' => 'Medium',
                'description' => 'The Blyxa japonica originates in the nutrient rich shallow pools of water, swamps and slowly flowing rivers in East and South East Asia.

                The plant has gained notoriety thanks to the late Takashi Amano and his aquarium works from the 90s.
                
                Blyxa has a distinct grass-like appearance that moves easily in the circulating aquarium water creating a sense of dynamicity in comparison to other more robust plants.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Bolbitis heudelotii',
                'type' => 'Rhizome',
                'origin' => 'Africa',
                'family' => 'Lomariopsidaceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Medium',
                'co2_demand' => 'Medium',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5 - 7',
                'temperature' => '20 - 28',
                'growth_height' => '15 - 30',
                'growth_width' => '15 - 25',
                'demands' => 'Medium',
                'description' => 'Bolbitis comes from West Africa, a fern with beautiful, transparent green leaves, 15-40 cm tall and wide. When planting do not cover the rhizome because it will rot, and it is best to plant Bolbitis heudelotii on a root or stone. 
                Easy to propagate by splitting the horizontal rhizome. Growth can be increased considerably by supplying CO2, and is only optimal in soft, slightly acidic water.',
                'created_at' => new DateTime()
            ],
            // [
            //      //new
            //     'name' => '',
            //     'type' => '',
            //     'origin' => '',
            //     'family' => '',
            //     'growt_rate' => '',
            //     'light_demand' => '',
            //     'co2_demand' => '',
            //     'hardness_tolerance' => '',
            //     'placement_area' => '',
            //     'ph_tolerance' => '',
            //     'temperature' => '',
            //     'growth_height' => '',
            //     'growth_width' => '',
            //     'demands' => '',
            //     'description' => '',
            //     'created_at' => new DateTime()
            // ],
            [
                //test3
                'name' => 'Bucephalandra pygmaea "Bukit Kelam"',
                'type' => 'Rhizome',
                'origin' => 'Borneo',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5 - 8',
                'temperature' => '15 - 28',
                'growth_height' => '5 - 10',
                'growth_width' => '2 - 5',
                'demands' => 'Easy',
                'description' => 'A new genus takes aquatics by storm! The endemic genus Bucephalandra is only found in Borneo and like the Cryptocorynes and Anubias it belongs to the arum family. The exact scientific definition is currently very uncertain, so we get the name of this variety from the habit of the plant. Bucephalandra species are epiphytes and should therefore be attached to stones and roots. The "Bukit Kelam" variety grows especially vigorously and is a decorative beauty. An ideal plant for Nano Cubes!',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Cabomba aquatica',
                'type' => 'Stem',
                'origin' => 'South America',
                'family' => 'Cabombaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Medium',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '6 - 7',
                'temperature' => '18 - 26',
                'growth_height' => '20 - 30',
                'growth_width' => '5 - 8',
                'demands' => 'Medium',
                'description' => 'Slender-tipped aquatic plant from South America that needs a lot of light. The leaf blades look like feathered fans, giving this plant an extremely graceful appearance. Soft water is absolutely essential for successful cultivation. If the tops of any shoots reach the water’s surface, it is possible that the plant will produce small floating leaves and yellow flowers. This stem plant should be planted in a group of several stems. Combine Cambomba aquatica with the large leaves of the Echinodorus as an attractive contrast.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Ceratopteris thalictroides',
                'type' => 'Rosulate',
                'origin' => 'Asia',
                'family' => 'Pteridaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Medium',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '5 - 9',
                'temperature' => '20 - 28',
                'growth_height' => '15 - 30',
                'growth_width' => '10 - 20',
                'demands' => 'Easy',
                'description' => 'The Sumatra fern has much daintier leaves than Ceratopteris cornuta. This species is found in many tropical regions. It usually grows in muddy, shallow waters, and sometimes in rice paddies. In aquaria, this graceful fern needs enough space since it is very fast-growing. With medium lighting it is easy to look after and does not cause any problems. This is a popular beginner’s plant and suitable for anyone new to aquatics.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Crinum calamistratum',
                'type' => 'Bulb / Onion',
                'origin' => 'Africa',
                'family' => 'Amaryllidaceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '20 - 28',
                'growth_height' => '40 - 120',
                'growth_width' => '10 - 30',
                'demands' => 'Medium',
                'description' => 'Crinum calamistratum from West Africa is a very graceful bulbous plant with dark-green, very narrow leaves. The curly leaves becomes 40-120 cm long. It forms smaller bulbs than the other Crinum-species, and requires less light. In the aquarium plants that are thriving form a number of small bulbs. It is not eaten by herbivorous fish. It can also be used in brackish aquariums with low salt concentrations.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Crinum thaianum',
                'type' => 'Bulb / Onion',
                'origin' => 'Asia',
                'family' => 'Amaryllidaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5.5 - 9',
                'temperature' => '18 - 28',
                'growth_height' => '60 - 200',
                'growth_width' => '20 - 25',
                'demands' => 'Easy',
                'description' => 'Crinum thaianum is a distinctive bulbous plant belonging to the lily
                family. It is undemanding apart from the fact that it needs plenty of space.
                Plant so the top 2/3 of the bulb is visible, because otherwise the bulb tends to
                rot. When the plant grows older it sometimes sends a flower stem up to the water
                surface with an aromatic, elegant lily flower. Herbivorous fish leave it alone
                due to its tough leaves. In Thailand the bulb is used in a cream used to soften
                the skin. It is also suitable for indoor ponds.',
                'created_at' => new DateTime()
            ],
            [
                //test4
                'name' => 'Cryptocoryne albida "Brown"',
                'type' => 'Rosulate',
                'origin' => 'Asia',
                'family' => 'Araceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Foreground - Midground',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '20 - 28',
                'growth_height' => '10 - 30',
                'growth_width' => '12 - 20',
                'demands' => 'Difficult',
                'description' => 'Cryptocoryne albida is available in two colour varieties - one
                light-green and the other red-brown with dark flecks on the leaves.
                Cryptocoryne albida needs slightly more light than other Cryptocorynes, and
                requires a very long period of acclimatisation before growth starts. However, it
                is then an easy plant to grow, although a nutritious bottom promotes growth. For
                many years this plant has been called Cryptocoryne costata.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Cryptocoryne beckettii',
                'type' => 'Rosulate',
                'origin' => 'Asia',
                'family' => 'Araceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Foreground - Midground',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '20 - 30',
                'growth_height' => '15 - 20',
                'growth_width' => '10 - 15',
                'demands' => 'Easy',
                'description' => 'Sri Lanka is home to many species of cryptocoryne, including the Cryptocoryne beckettii. These plants have also been successfully cultivated in aquaria for decades. In the wild they are found in shaded areas near the banks of streams and rivers, where they grow amphibiously above and below the waterline. The colour of any submerged leaves varies in shades of green and brown. Different leaf colouration within the same species is typical for the Cryptocoryne genus.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Cryptocoryne wendtii "Green"',
                'type' => 'Rosulate',
                'origin' => 'Asia',
                'family' => 'Araceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Foreground - Midground',
                'ph_tolerance' => '5.5 - 9',
                'temperature' => '20 - 30',
                'growth_height' => '5 - 10',
                'growth_width' => '8 - 10',
                'demands' => 'Medium',
                'description' => 'This Cryptocoryne has been one of the most popular aquarium plants for decades. A robust nature and fantastic adaptability make these plants almost mandatory for any beginner"s underwater landscape. Whether as a cluster in a small Nano Cube or flat cushion plants in a larger show aquarium, this Cryptocoryne combines an optimum growth habit with a highly attractive appearance! These plants stay much smaller with good lighting.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Egeria densa',
                'type' => 'Stem',
                'origin' => 'Cosmopolitan',
                'family' => 'Hydrocharitaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Background',
                'ph_tolerance' => '5 - 10',
                'temperature' => '10 - 26',
                'growth_height' => '20 - 30',
                'growth_width' => '3 - 5',
                'demands' => 'Easy',
                'description' => 'The common name "waterweed" gives you some idea of the growth habits of this plant. Egeria densa is one of the best growers of all, and there are absolutely no issues with cultivation. Native to Southeast Brazil and Argentina, it has now spread across every continent. The "dense" variety displays extremely close, compact leaf growth along the stem. It also grows very well in garden ponds - either planted or floating - but is not completely winter-hardy.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Eleocharis acicularis',
                'type' => 'Stolon',
                'origin' => 'Cosmopolitan',
                'family' => 'Cyperaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Foreground - Background',
                'ph_tolerance' => '5 - 8',
                'temperature' => '15 - 25',
                'growth_height' => '10 - 15',
                'growth_width' => '5 - 10',
                'demands' => 'Medium',
                'description' => 'The needle rush Eleocharis acicularis is found all over the world. It is a particularly lithe, grass-like plant for the foreground. It prefers cooler water, but does grow perfectly well at higher temperatures. Side runners shoot out over time to produce a thick carpet of plants. When bedding in plants cultivated in the emersed state, we recommend pruning hard and dividing any dense plant cushions. Plant the cut rootstock at 5 cm intervals. The first submerged blades will appear after just a few days.',
                'created_at' => new DateTime()
            ],
            [
                //test5
                'name' => 'Fissidens fontanus',
                'type' => 'Moss',
                'origin' => 'Asia Tenggara',
                'family' => 'Fissidentaceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Medium',
                'co2_demand' => 'Medium',
                'hardness_tolerance' => 'Medium - Hard',
                'placement_area' => 'On Root or On Rock',
                'ph_tolerance' => '5 - 8',
                'temperature' => '22 - 28',
                'growth_height' => '3 - 5',
                'growth_width' => '3 - 5',
                'demands' => 'Medium',
                'description' => 'This featherlike Fissidens-moss with tight deep green down comes from North America. It grows relatively slow and requires much more light than other mosses. Suitable for attaching to wood pieces or rocks both vertically and horizontally in the aquarium. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Glossostigma elatinoides',
                'type' => 'Carpeting',
                'origin' => 'Australia',
                'family' => 'Scrophulariaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'High',
                'co2_demand' => 'High',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Foreground',
                'ph_tolerance' => '5 - 7.5',
                'temperature' => '15 - 26',
                'growth_height' => '3 - 5',
                'growth_width' => '3 - 5',
                'demands' => 'Difficult',
                'description' => 'Glossostigma elatinoides from New Zealand is much in demand in Japanese-inspired aquariums. It is one of the smallest aquarium plants (2-3 cm tall), and thus a good foreground plant. A difficult plant demanding a lot of light. Grows upwards if light is poor. Make sure larger plants do not overshadow it. When planting in the aquarium small clumps (approx. 1/8 pot) should be placed at intervals of a few centimetres to help the plants grow together more quickly. CO2 addition and soft water promote growth significantly. ',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Helanthium tenellum "Green"',
                'type' => 'Carpeting',
                'origin' => 'Nordamerika',
                'family' => 'Alismataceae',
                'growt_rate' => 'Slow',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Foreground',
                'ph_tolerance' => '5 - 8',
                'temperature' => '20 - 28',
                'growth_height' => '5 - 15',
                'growth_width' => '3 - 5',
                'demands' => 'Easy',
                'description' => 'This small rosulate plant will easily make a 5-10 cm high carpet when the light is good and the bottom layer nutritious. Even at an intense light level this variety remains fresh green unlike the usual, more reddish, Helanthium tenellum.
                An easy and quite undemanding foreground plant.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Hemianthus callitrichoides "Cuba"',
                'type' => 'Carpeting',
                'origin' => 'North America',
                'family' => 'Scrophulariaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'High',
                'co2_demand' => 'High',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Foreground',
                'ph_tolerance' => '5 - 7.5',
                'temperature' => '18 - 28',
                'growth_height' => '3 - 5',
                'growth_width' => '3 - 5',
                'demands' => 'Difficult',
                'description' => 'Dwarf baby tears was first discovered several years ago in a stream on the island of Cuba. Leaves just a few millimetres wide make this Hemianthus the smallest aquarium plant in the world. It is a highly adaptable plant in terms of water values, but it is important to provide good lighting and a good CO2 supply. Plants that grow above water can be divided into small pieces and planted. In a few weeks you will have a dense foreground carpet. Aquarium designs combining these plants with all kinds of rockwork look both ornamental and natural.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Heteranthera zosterifolia',
                'type' => 'Stem',
                'origin' => 'South America',
                'family' => 'Pontederiaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Low',
                'co2_demand' => 'Medium',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5.5 - 8',
                'temperature' => '18 - 30',
                'growth_height' => '30 - 50',
                'growth_width' => '6 - 12',
                'demands' => 'Easy',
                'description' => 'The stem plant Heteranthera zosterifolia is a stunning beauty in the aquarium. The vibrant, light green leaves are up to 5 cm long and grow in an alternating leaf formation. Its requirements are relatively minimal, with good lighting and CO2 fertilisation, growth is compact and fast. It is therefore recommended that the shoots are trimmed regularly. On our Plantahunter tour in Brazil, we saw the plant in the Rio da Prata over several kilometres of river. In fact, we even encountered lush plants in the crystal clear water where it was 2 m deep. The Heteranthera is a plant that is rich in contrast for the midground to background and works especially well in combination with colourful plants such as Rotala rotundifolia.',
                'created_at' => new DateTime()
            ],
            [
                'name' => 'Hottonia palustris',
                'type' => 'Stem',
                'origin' => 'Europa',
                'family' => 'Primulaceae',
                'growt_rate' => 'Medium',
                'light_demand' => 'Low',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Medium',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5 - 7.5',
                'temperature' => '10 - 26',
                'growth_height' => '10 - 20',
                'growth_width' => '5 - 10',
                'demands' => 'Easy',
                'description' => 'The featherfoil is a graceful plant with pinnate leaves. It has long been known in aquatic hobby as well growing for the fore- or middle ground. However, good lighting and sufficient CO2 are necessary for good growth. For unheated aquariums, Hottonia is highly recommended due to its distribution in temperate climates. It is even native to some locations in Germany and is under conservation there. Due to the beautifully slotted leaves you can place the featherfoil in a very high contrast in a carpet of Hemianthus Cuba or Micranthemum spec. Place "Montecarlo".',
                'created_at' => new DateTime()
            ],
            [
                //test6
                'name' => 'Hydrocotyle tripartita',
                'type' => 'Stem',
                'origin' => 'Asia',
                'family' => 'Apiaceae',
                'growt_rate' => 'Fast',
                'light_demand' => 'Medium',
                'co2_demand' => 'Low',
                'hardness_tolerance' => 'Soft - Hard',
                'placement_area' => 'Midground',
                'ph_tolerance' => '5 - 8',
                'temperature' => '18 - 28',
                'growth_height' => '5 - 5',
                'growth_width' => '3 - 5',
                'demands' => 'Medium',
                'description' => 'Hydrocotyle sp."Japan" is the popular name of the plant in different plant forums. It is a variant of Hydrocotyle tripartita from South-East Asia. It is characterised by fast, compact growth and small, intense green leaves on vertical stems. The plant is carpet-forming (5-10 cm tall) and its compact growth can be promoted by physically pressing the carpet with your hand when maintaining your aquarium (mechanical retardation). Carpet formation and compact growth do best in good light. ',
                'created_at' => new DateTime()
            ],
            // [
            //     'name' => '',
            //     'type' => '',
            //     'origin' => '',
            //     'family' => '',
            //     'growt_rate' => '',
            //     'light_demand' => '',
            //     'co2_demand' => '',
            //     'hardness_tolerance' => '',
            //     'placement_area' => '',
            //     'ph_tolerance' => '',
            //     'temperature' => '',
            //     'growth_height' => '',
            //     'growth_width' => '',
            //     'demands' => '',
            //     'description' => '',
            //     'created_at' => new DateTime()
            // ],
        ]);
    }
}
