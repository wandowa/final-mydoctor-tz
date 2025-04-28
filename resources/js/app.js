import './bootstrap';

// <!-- JavaScript for Counter Animation -->
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 100; // Animation speed (higher = slower)

    const animateCounters = () => {
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            };

            // Check if element is in viewport
            const rect = counter.getBoundingClientRect();
            if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
                updateCount();
            }
        });
    };

    // Trigger animation on scroll
    window.addEventListener('scroll', () => {
        animateCounters();
    });

    // Trigger on load in case it's already in view
    animateCounters();
});

 // Preloader
// Preloader
// window.addEventListener('load', () => {
//     const preloader = document.getElementById('preloader');
//     const content = document.getElementById('content');

//     // Immediately start fading out preloader and fading in content
//     preloader.classList.add('opacity-0');
//     content.classList.add('opacity-100');

//     // Hide preloader after fade-out completes
//     setTimeout(() => {
//         preloader.classList.add('hidden');
//         content.classList.remove('bg-green-800'); // Reset content background to match body
//     }, 1000); // Matches transition duration
// });

// <!-- JavaScript for Menu Toggle -->
const menuToggleBtn = document.getElementById('menu-toggle-btn');
const menuCloseBtn = document.getElementById('menu-close-btn');
const menu = document.getElementById('menu');

menuToggleBtn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
});

menuCloseBtn.addEventListener('click', () => {
    menu.classList.add('hidden');
});

// Project js code for description
document.querySelectorAll('.read-more').forEach(button => {
    button.addEventListener('click', (e) => {
        const preview = e.target.parentElement;
        const fullText = preview.getAttribute('data-full-text');
        preview.innerHTML = fullText;
    });
});