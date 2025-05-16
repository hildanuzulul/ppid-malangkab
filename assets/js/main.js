/**
 * Template Name: Eterna
 * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
 * Updated: Aug 07 2024 with Bootstrap v5.3.3
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */

(function () {
	"use strict";

	/**
	 * Apply .scrolled class to the body as the page is scrolled down
	 */
	function toggleScrolled() {
		const selectBody = document.querySelector("body");
		const selectHeader = document.querySelector("#header");
		if (
			!selectHeader.classList.contains("scroll-up-sticky") &&
			!selectHeader.classList.contains("sticky-top") &&
			!selectHeader.classList.contains("fixed-top")
		)
			return;
		window.scrollY > 100
			? selectBody.classList.add("scrolled")
			: selectBody.classList.remove("scrolled");
	}

	document.addEventListener("scroll", toggleScrolled);
	window.addEventListener("load", toggleScrolled);

	/**
	 * Mobile nav toggle
	 */
	const mobileNavToggleBtn = document.querySelector(".mobile-nav-toggle");

	function mobileNavToogle() {
		document.querySelector("body").classList.toggle("mobile-nav-active");
		mobileNavToggleBtn.classList.toggle("bi-list");
		mobileNavToggleBtn.classList.toggle("bi-x");
	}
	mobileNavToggleBtn.addEventListener("click", mobileNavToogle);

	/**
	 * Hide mobile nav on same-page/hash links
	 */
	document.querySelectorAll("#navmenu a").forEach((navmenu) => {
		navmenu.addEventListener("click", () => {
			if (document.querySelector(".mobile-nav-active")) {
				mobileNavToogle();
			}
		});
	});

	/**
	 * Highlight active nav menu item based on current URL
	 */
	function setActiveNavMenu() {
		let path = window.location.pathname.split("/").pop();
		if (path === "" || path === "index.html") {
			path = "beranda"; // Default halaman jika tidak ada path
		}

		document.querySelectorAll("#navmenu a").forEach((navmenu) => {
			let href = navmenu.getAttribute("href");
			if (href === path) {
				navmenu.classList.add("active");
			} else {
				navmenu.classList.remove("active");
			}
		});
	}
	window.addEventListener("load", setActiveNavMenu);

	/**
	 * Toggle mobile nav dropdowns
	 */
	document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
		navmenu.addEventListener("click", function (e) {
			e.preventDefault();
			this.parentNode.classList.toggle("active");
			this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
			e.stopImmediatePropagation();
		});
	});

	/**
	 * Preloader
	 */
	const preloader = document.querySelector("#preloader");
	if (preloader) {
		window.addEventListener("load", () => {
			preloader.remove();
		});
	}

	/**
	 * Scroll top button
	 */
	let scrollTop = document.querySelector(".scroll-top");

	function toggleScrollTop() {
		if (scrollTop) {
			window.scrollY > 100
				? scrollTop.classList.add("active")
				: scrollTop.classList.remove("active");
		}
	}
	scrollTop.addEventListener("click", (e) => {
		e.preventDefault();
		window.scrollTo({
			top: 0,
			behavior: "smooth",
		});
	});

	window.addEventListener("load", toggleScrollTop);
	document.addEventListener("scroll", toggleScrollTop);

	/**
	 * Animation on scroll function and init
	 */
	function aosInit() {
		AOS.init({
			duration: 600,
			easing: "ease-in-out",
			once: true,
			mirror: false,
		});
	}
	window.addEventListener("load", aosInit);

	/**
	 * Init swiper sliders
	 */
	function initSwiper() {
		document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
			let config = JSON.parse(
				swiperElement.querySelector(".swiper-config").innerHTML.trim()
			);

			if (swiperElement.classList.contains("swiper-tab")) {
				initSwiperWithCustomPagination(swiperElement, config);
			} else {
				new Swiper(swiperElement, config);
			}
		});
	}

	window.addEventListener("load", initSwiper);

	/**
	 * Initiate Pure Counter
	 */
	new PureCounter();

	/**
	 * Animate the skills items on reveal
	 */
	let skillsAnimation = document.querySelectorAll(".skills-animation");
	skillsAnimation.forEach((item) => {
		new Waypoint({
			element: item,
			offset: "80%",
			handler: function (direction) {
				let progress = item.querySelectorAll(".progress .progress-bar");
				progress.forEach((el) => {
					el.style.width = el.getAttribute("aria-valuenow") + "%";
				});
			},
		});
	});

	/**
	 * Initiate glightbox
	 */
	const glightbox = GLightbox({
		selector: ".glightbox",
	});

	/**
	 * Init isotope layout and filters
	 */
	document.querySelectorAll(".isotope-layout").forEach(function (isotopeItem) {
		let layout = isotopeItem.getAttribute("data-layout") ?? "masonry";
		let filter = isotopeItem.getAttribute("data-default-filter") ?? "*";
		let sort = isotopeItem.getAttribute("data-sort") ?? "original-order";

		let initIsotope;
		imagesLoaded(isotopeItem.querySelector(".isotope-container"), function () {
			initIsotope = new Isotope(
				isotopeItem.querySelector(".isotope-container"),
				{
					itemSelector: ".isotope-item",
					layoutMode: layout,
					filter: filter,
					sortBy: sort,
				}
			);
		});

		isotopeItem
			.querySelectorAll(".isotope-filters li")
			.forEach(function (filters) {
				filters.addEventListener(
					"click",
					function () {
						isotopeItem
							.querySelector(".isotope-filters .filter-active")
							.classList.remove("filter-active");
						this.classList.add("filter-active");
						initIsotope.arrange({
							filter: this.getAttribute("data-filter"),
						});
						if (typeof aosInit === "function") {
							aosInit();
						}
					},
					false
				);
			});
	});

	document.addEventListener("DOMContentLoaded", function () {
		const faqQuestions = document.querySelectorAll(".faq-question");

		faqQuestions.forEach((question) => {
			const answer = question.nextElementSibling;
			const icon = question.querySelector(".faq-icon");

			if (question.classList.contains("active")) {
				answer.style.display = "block";
				icon.textContent = "−";
			}

			question.addEventListener("click", function () {
				const isActive = this.classList.contains("active");

				// Tutup semua jawaban & reset ikon serta warna font
				faqQuestions.forEach((btn) => {
					btn.classList.remove("active");
					btn.querySelector(".faq-icon").textContent = "+";
					btn.nextElementSibling.style.display = "none";
				});

				// Jika tidak dalam keadaan terbuka, maka buka dan ubah warna menjadi merah
				if (!isActive) {
					this.classList.add("active");
					this.querySelector(".faq-icon").textContent = "−";
					this.nextElementSibling.style.display = "block";
				}
			});
		});
	});
})();

// Toggle Password
function togglePassword() {
	const passwordInput = document.getElementById("password");
	const eyeIcon = document.getElementById("eyeIcon");

	if (passwordInput.type === "password") {
		passwordInput.type = "text";
		eyeIcon.classList.remove("bi-eye-fill");
		eyeIcon.classList.add("bi-eye-slash-fill");
	} else {
		passwordInput.type = "password";
		eyeIcon.classList.remove("bi-eye-slash-fill");
		eyeIcon.classList.add("bi-eye-fill");
	}
}

// Preview file Image with Toggle
function handleFileName(event, fileNameId, previewId) {
	const input = event.target;
	const fileNameTag = document.getElementById(fileNameId);
	const preview = document.getElementById(previewId);

	if (input.files && input.files[0]) {
		const file = input.files[0];
		const reader = new FileReader();

		reader.onload = function (e) {
			preview.src = e.target.result;
			preview.style.display = "none"; // default hidden
			fileNameTag.textContent = file.name;
		};

		reader.readAsDataURL(file);
	}
}

function togglePreview(previewId) {
	const preview = document.getElementById(previewId);
	if (preview.style.display === "none") {
		preview.style.display = "block";
	} else {
		preview.style.display = "none";
	}
}

// Contact
document.addEventListener("DOMContentLoaded", () => {
	const form = document.getElementById("contact-form");
	const tableBody = document.getElementById("form-results");

	// 1. Fungsi untuk render data dari localStorage ke tabel
	function renderTable() {
		tableBody.innerHTML = ""; // Kosongkan dulu
		const messages = JSON.parse(localStorage.getItem("formMessages")) || [];
		messages.forEach((msg) => {
			const tr = document.createElement("tr");
			const td = document.createElement("td");
			// td.innerHTML = `<strong>${msg.name}</strong> ${msg.message}`;
			td.innerHTML = `
			<div class="contact-message">
			  <strong class="message-name">${msg.name}</strong>
			  <span class="message-content">${msg.message}</span>
			</div>`;
			tr.appendChild(td);
			tableBody.appendChild(tr);
		});
	}

	// 2. Saat form disubmit
	form.addEventListener("submit", function (event) {
		event.preventDefault();

		const name = form.elements["name"].value.trim();
		const message = form.elements["message"].value.trim();

		if (name && message) {
			// Ambil data lama, tambahkan data baru
			const messages = JSON.parse(localStorage.getItem("formMessages")) || [];
			messages.push({ name, message });
			localStorage.setItem("formMessages", JSON.stringify(messages));

			// Render ulang tabel
			renderTable();

			// Reset form
			form.reset();

			// Tampilkan notifikasi
			document.querySelector(".sent-message").style.display = "block";
			setTimeout(() => {
				document.querySelector(".sent-message").style.display = "none";
			}, 3000);
		}
	});

	// 3. Saat halaman pertama kali dibuka, langsung render data
	renderTable();
});

document.addEventListener("DOMContentLoaded", function () {
	const searchInput = document.querySelector(".search-input");
	const tableRows = document.querySelectorAll("#form-results tr");

	searchInput.addEventListener("keyup", function () {
		const keyword = searchInput.value.toLowerCase();

		tableRows.forEach((row) => {
			const text = row.textContent.toLowerCase();
			row.style.display = text.includes(keyword) ? "" : "none";
		});
	});
});

// Informasi search
function searchTable() {
	const input = document.getElementById("searchInput");
	const filter = input.value.toLowerCase();
	const table = document.querySelector(".table-informasi");
	const rows = table.querySelectorAll("tbody tr");

	rows.forEach((row) => {
		const cells = row.querySelectorAll("td");
		let match = false;

		cells.forEach((cell) => {
			if (cell.textContent.toLowerCase().includes(filter)) {
				match = true;
			}
		});

		row.style.display = match ? "" : "none";
	});
}

// informasi download
document.addEventListener("DOMContentLoaded", function () {
	document.querySelectorAll(".btn-download").forEach(function (el) {
		el.addEventListener("click", function () {
			const fileUrl = this.getAttribute("data-file");
			const link = document.createElement("a");
			link.href = fileUrl;
			link.download = ""; // biar auto download
			document.body.appendChild(link);
			link.click();
			document.body.removeChild(link);
		});
	});
});

// pagination
function changeLimit() {
	const limit = document.getElementById("limitSelect").value;
	const url = new URL(window.location.href);
	url.searchParams.set("limit", limit);
	url.searchParams.set("offset", 0); // reset ke halaman pertama
	window.location.href = url.toString();
}
