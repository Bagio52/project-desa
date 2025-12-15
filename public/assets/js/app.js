(function() {
  "use strict";

  // Apply .scrolled class to the body as the page is scrolled down
  function toggleScrolled() {
    const selectBody = document.body;
    const selectHeader = document.querySelector('#header');

    if (selectHeader && (selectHeader.classList.contains('scroll-up-sticky') ||
        selectHeader.classList.contains('sticky-top') ||
        selectHeader.classList.contains('fixed-top'))) {
      selectBody.classList.toggle('scrolled', window.scrollY > 100);
    }
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  // Mobile nav toggle
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToggle() {
    document.body.classList.toggle('mobile-nav-active');
    if (mobileNavToggleBtn) {
      mobileNavToggleBtn.classList.toggle('bi-list');
      mobileNavToggleBtn.classList.toggle('bi-x');
    }
  }

  mobileNavToggleBtn?.addEventListener('click', mobileNavToggle);

  // Hide mobile nav on same-page/hash links
  document.querySelectorAll('#sidebar a').forEach(sidebar => {
    sidebar.addEventListener('click', () => {
      if (document.body.classList.contains('mobile-nav-active')) {
        mobileNavToggle();
      }
    });
  });

  // Scroll top button
  const scrollTop = document.querySelector('.scroll-top');

  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    document.addEventListener('scroll', () => {
      scrollTop.classList.toggle('active', window.scrollY > 100);
    });
  }

  // Sidebar Scrollspy
  const sidebarLinks = document.querySelectorAll('.sidebar a');

  function sidebarScrollspy() {
    sidebarLinks.forEach(link => {
      if (!link.hash) return;
      const section = document.querySelector(link.hash);
      if (!section) return;
      const position = window.scrollY + 200;
      link.classList.toggle('active', position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight));
    });
  }

  window.addEventListener('scroll', sidebarScrollspy);
  window.addEventListener('load', sidebarScrollspy);

  // Toggle sidebar collapse
  document.getElementById('sidebarCollapse')?.addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active'); // Pastikan kelas ini ada di CSS untuk mengontrol visibilitas
  });

  // Popup Form Handling
  document.addEventListener('DOMContentLoaded', function() {
    const popupForm = document.getElementById('create');
    const openFormButton = document.getElementById('openForm');
    const closeFormButton = document.getElementById('closeForm');

    // Open Modal
    function openModal() {
      popupForm.style.display = 'block';
    }

    // Close Modal
    function closeModal() {
      popupForm.style.display = 'none';
    }

    // Event listener for opening modal
    if (openFormButton) {
      openFormButton.addEventListener('click', openModal);
    }

    // Event listener for closing modal
    if (closeFormButton) {
      closeFormButton.addEventListener('click', closeModal);
    }

    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
      if (event.target === popupForm) {
        closeModal();
      }
    });
  });
})();
