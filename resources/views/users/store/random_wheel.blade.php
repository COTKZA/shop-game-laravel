@extends('layouts.app')

@section('content')
    <div class="relative overflow-hidden bg-cover bg-center px-4 sm:px-0 pb-10"
        style="background-image: linear-gradient(rgba(21, 128, 61, 0.9), rgb(24, 24, 27) 90%), url(/img/bg.webp);">
        <div class="max-w-6xl mx-auto p-5 mt-30 md:px-4">
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-5xl md:text-6xl font-bold text-csgo-orange mb-4 drop-shadow-lg"
                    style="text-shadow: 0 0 20px rgba(255, 107, 53, 0.5);">
                    สุ่มของรางวัล
                </h1>
                <p class="text-xl text-gray-300">เปิดกล่องและสุ่มรับ Skin ของคุณ!</p>
            </div>

            <!-- Roulette Container -->
            <div class="bg-black/30 rounded-3xl p-8 my-10 overflow-hidden relative">
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-1 h-56 bg-csgo-orange z-10 bg-red-500">
                </div>
                <div class="transition-transform duration-[3000ms] ease-[cubic-bezier(0.25,0.1,0.25,1)] flex gap-3 py-5"
                    id="rouletteWheel">
                    <!-- Items will be generated here -->
                </div>
            </div>

            <!-- Controls -->
            <div class="text-center my-8">
                <button
                    class="bg-gradient-to-r from-csgo-orange to-csgo-gold border-none rounded-full text-white text-xl font-bold cursor-pointer transition-all duration-300 uppercase tracking-wider hover:scale-105 hover:shadow-lg hover:shadow-csgo-orange/40 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none btn btn-success"
                    id="spinBtn">
                    SPIN
                </button>
            </div>

            <!-- Inventory -->
            <div class="mt-10 bg-black/20 rounded-3xl p-8">
                <h2 class="text-center text-2xl font-bold mb-6 text-csgo-orange">📦 คลังของคุณ</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4" id="inventoryGrid">
                    <!-- Inventory items will appear here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Game data
        const weaponSkins = [{
                name: "AK-47 | Redline",
                rarity: "legendary",
                type: "weapon"
            },
            {
                name: "AWP | Dragon Lore",
                rarity: "legendary",
                type: "weapon"
            },
            {
                name: "M4A4 | Howl",
                rarity: "legendary",
                type: "weapon"
            },
            {
                name: "AK-47 | Fire Serpent",
                rarity: "legendary",
                type: "weapon"
            },
            {
                name: "M4A1-S | Knight",
                rarity: "epic",
                type: "weapon"
            },
            {
                name: "AK-47 | Vulcan",
                rarity: "epic",
                type: "weapon"
            },
            {
                name: "AWP | Hyper Beast",
                rarity: "epic",
                type: "weapon"
            },
            {
                name: "M4A4 | Asiimov",
                rarity: "epic",
                type: "weapon"
            },
            {
                name: "AK-47 | Point Disarray",
                rarity: "rare",
                type: "weapon"
            },
            {
                name: "M4A1-S | Cyrex",
                rarity: "rare",
                type: "weapon"
            },
            {
                name: "AWP | Worm God",
                rarity: "rare",
                type: "weapon"
            },
            {
                name: "Glock-18 | Water Elemental",
                rarity: "rare",
                type: "weapon"
            },
            {
                name: "P90 | Asiimov",
                rarity: "common",
                type: "weapon"
            },
            {
                name: "MAC-10 | Neon Rider",
                rarity: "common",
                type: "weapon"
            },
            {
                name: "FAMAS | Djinn",
                rarity: "common",
                type: "weapon"
            },
            {
                name: "UMP-45 | Primal Saber",
                rarity: "common",
                type: "weapon"
            }
        ];

        let currentCase = 'weapon';
        let inventory = [];
        let isSpinning = false;

        // Initialize
        function init() {
            generateRouletteItems();
            updateInventoryDisplay();
            document.getElementById('spinBtn').addEventListener('click', spinRoulette);
        }

        function generateRouletteItems(selectedItem) {
            const rouletteWheel = document.getElementById('rouletteWheel');
            const items = weaponSkins;

            // Generate 50 items for smooth scrolling, ensure selectedItem is at position 25
            const rouletteItems = [];
            for (let i = 0; i < 50; i++) {
                if (i === 25 && selectedItem) {
                    rouletteItems.push(selectedItem);
                } else {
                    const randomItem = items[Math.floor(Math.random() * items.length)];
                    rouletteItems.push(randomItem);
                }
            }

            const rarityClasses = {
                legendary: 'border-legendary bg-gradient-to-br from-legendary/20 to-legendary/10',
                epic: 'border-epic bg-gradient-to-br from-epic/20 to-epic/10',
                rare: 'border-rare bg-gradient-to-br from-rare/20 to-rare/10',
                common: 'border-common bg-gradient-to-br from-common/20 to-common/10'
            };

            const rarityTextClasses = {
                legendary: 'text-legendary',
                epic: 'text-epic',
                rare: 'text-rare',
                common: 'text-common'
            };

            rouletteWheel.innerHTML = rouletteItems.map((item, index) => `
                <div class="min-w-36 h-48 bg-white/10 rounded-2xl p-4 text-center flex flex-col justify-center border-2 border-transparent transition-all duration-300 ${rarityClasses[item.rarity]}" data-index="${index}">
                    <div class="text-3xl mb-3">
                        🔫
                    </div>
                    <div class="text-xs font-bold mb-2">
                        ${item.name}
                    </div>
                    <div class="${rarityTextClasses[item.rarity]} text-xs font-bold">
                        ${item.rarity.toUpperCase()}
                    </div>
                </div>
            `).join('');
        }

        function spinRoulette() {
            if (isSpinning) return;

            isSpinning = true;
            const spinBtn = document.getElementById('spinBtn');
            spinBtn.disabled = true;
            spinBtn.textContent = '🎰 กำลังหมุน...';

            // Select the winning item first
            const items = weaponSkins;
            const selectedItem = getRandomItemWithProbability(items);

            // Generate roulette items with the selected item at position 25
            generateRouletteItems(selectedItem);

            // Reset position
            const rouletteWheel = document.getElementById('rouletteWheel');
            rouletteWheel.style.transition = 'none';
            rouletteWheel.style.transform = 'translateX(0px)';

            // Force reflow
            rouletteWheel.offsetHeight;

            // Calculate stop position to align the 25th item (index 25) with the pointer
            const itemWidth = 160; // Approximate width of each item (min-w-36 + gap)
            const pointerOffset = 0; // Pointer is at center (left-1/2), no additional offset needed
            const stopPosition = -((25 * itemWidth) + pointerOffset); // Stop so the 25th item aligns with the pointer

            // Animate spin
            rouletteWheel.style.transition = 'transform 3s cubic-bezier(0.25, 0.1, 0.25, 1)';
            rouletteWheel.style.transform = `translateX(${stopPosition}px)`;

            // Show result after animation
            setTimeout(() => {
                showResult(selectedItem);
                addToInventory(selectedItem);

                spinBtn.disabled = false;
                spinBtn.textContent = '🎰 SPIN AGAIN!';
                isSpinning = false;
            }, 3000);
        }

        function getRandomItemWithProbability(items) {
            const probabilities = {
                legendary: 0.02, // 2%
                epic: 0.08, // 8%
                rare: 0.2, // 20%
                common: 0.7 // 70%
            };

            const random = Math.random();
            let cumulative = 0;

            for (const [rarity, prob] of Object.entries(probabilities)) {
                cumulative += prob;
                if (random <= cumulative) {
                    const itemsOfRarity = items.filter(item => item.rarity === rarity);
                    return itemsOfRarity[Math.floor(Math.random() * itemsOfRarity.length)];
                }
            }

            // Fallback to common
            const commonItems = items.filter(item => item.rarity === 'common');
            return commonItems[Math.floor(Math.random() * commonItems.length)];
        }

        function showResult(item) {
            const rarityTextClasses = {
                legendary: 'text-legendary',
                epic: 'text-epic',
                rare: 'text-rare',
                common: 'text-common'
            };

            Swal.fire({
                // title: "🎉 คุณได้รับ!",
                html: `
                    <div>
                        <h3>${item.name}</h3>
                        <p class="${rarityTextClasses[item.rarity]}">
                            ${item.rarity.toUpperCase()}
                        </p>
                    </div>
                `,
                icon: "success",
                confirmButtonText: "ตกลง",
                customClass: {
                    popup: 'bg-black/30 rounded-3xl',
                    title: 'text-3xl font-bold text-white',
                    confirmButton: 'bg-gradient-to-r from-csgo-orange to-csgo-gold border-none rounded-full text-white text-xl font-bold cursor-pointer transition-all duration-300 uppercase tracking-wider hover:scale-105 hover:shadow-lg hover:shadow-csgo-orange/40'
                }
            });

            // Play celebration effect for legendary items
            if (item.rarity === 'legendary') {
                createFireworks();
            }
        }

        function addToInventory(item) {
            inventory.push({
                ...item,
                id: Date.now() + Math.random(),
                timestamp: new Date().toLocaleString('th-TH')
            });
            updateInventoryDisplay();
        }

        function updateInventoryDisplay() {
            const inventoryGrid = document.getElementById('inventoryGrid');

            if (inventory.length === 0) {
                inventoryGrid.innerHTML = '<p class="col-span-full text-center text-gray-500">ยังไม่มีไอเทมในคลัง</p>';
                return;
            }

            const rarityClasses = {
                legendary: 'border-legendary',
                epic: 'border-epic',
                rare: 'border-rare',
                common: 'border-common'
            };

            const rarityTextClasses = {
                legendary: 'text-legendary',
                epic: 'text-epic',
                rare: 'text-rare',
                common: 'text-common'
            };

            inventoryGrid.innerHTML = inventory.slice(-20).reverse().map(item => `
                <div class="bg-white/10 rounded-lg p-3 text-center border-2 border-transparent transition-all duration-300 hover:-translate-y-1 ${rarityClasses[item.rarity]}">
                    <div class="text-2xl mb-2">
                        🔫
                    </div>
                    <div class="text-xs mb-1 leading-tight">
                        ${item.name}
                    </div>
                    <div class="${rarityTextClasses[item.rarity]} text-xs font-bold mb-1">
                        ${item.rarity.toUpperCase()}
                    </div>
                    <div class="text-xs text-gray-500">
                        ${item.timestamp}
                    </div>
                </div>
            `).join('');
        }

        function createFireworks() {
            for (let i = 0; i < 10; i++) {
                setTimeout(() => {
                    const firework = document.createElement('div');
                    firework.className = 'fixed w-3 h-3 bg-csgo-orange rounded-full animate-firework z-50';
                    firework.style.left = Math.random() * window.innerWidth + 'px';
                    firework.style.top = Math.random() * window.innerHeight + 'px';

                    document.body.appendChild(firework);

                    setTimeout(() => {
                        firework.remove();
                    }, 1000);
                }, i * 100);
            }
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', init);
    </script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'csgo-orange': '#ff6b35',
                        'csgo-gold': '#f7931e',
                        'legendary': '#ff6b35',
                        'epic': '#8b5cf6',
                        'rare': '#3b82f6',
                        'common': '#10b981'
                    },
                    animation: {
                        'glow': 'glow 2s infinite alternate',
                        'firework': 'firework 1s ease-out forwards'
                    },
                    keyframes: {
                        glow: {
                            '0%': {
                                boxShadow: '0 0 20px rgba(255, 107, 53, 0.3)'
                            },
                            '100%': {
                                boxShadow: '0 0 40px rgba(255, 107, 53, 0.6)'
                            }
                        },
                        firework: {
                            '0%': {
                                transform: 'scale(0)',
                                opacity: '1'
                            },
                            '50%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            },
                            '100%': {
                                transform: 'scale(2)',
                                opacity: '0'
                            }
                        }
                    }
                }
            }
        }
    </script>
@endsection
