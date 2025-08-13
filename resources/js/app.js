import "./bootstrap"; // Keep this for Laravel Breeze's default JS

document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("main-content");
  const sidebarToggleOpen = document.getElementById("sidebar-toggle-open");
  const sidebarToggleClose = document.getElementById("sidebar-toggle-close");
  const searchBox = document.querySelector(".navbar-search-md-block");

  if (sidebar && mainContent && sidebarToggleOpen && sidebarToggleClose) {
    // Function to open sidebar
    const openSidebar = () => {
      sidebar.classList.add("is-open");
      // For mobile, hide the open button when sidebar is open
      if (window.innerWidth < 768) {
        sidebarToggleOpen.classList.add("hidden");
        if (searchBox) {
          searchBox.classList.add("hidden");
        }
      }
    };

    // Function to close sidebar
    const closeSidebar = () => {
      sidebar.classList.remove("is-open");
      // For mobile, show the open button when sidebar is closed
      if (window.innerWidth < 768) {
        sidebarToggleOpen.classList.remove("hidden");
        if (searchBox) {
          searchBox.classList.remove("hidden");
        }
      }
    };

    // Event listeners for toggle buttons
    sidebarToggleOpen.addEventListener("click", openSidebar);
    sidebarToggleClose.addEventListener("click", closeSidebar);

    // Close sidebar when clicking outside on mobile
    document.addEventListener("click", (event) => {
      const isClickInsideSidebar = sidebar.contains(event.target);
      const isClickOnOpenToggle = sidebarToggleOpen.contains(event.target);
      const isClickOnCloseToggle = sidebarToggleClose.contains(event.target);

      if (
        sidebar.classList.contains("is-open") &&
        !isClickInsideSidebar &&
        !isClickOnOpenToggle &&
        !isClickOnCloseToggle &&
        window.innerWidth < 768
      ) {
        closeSidebar();
      }
    });

    // Initialize sidebar state on load and resize
    const adjustSidebarForScreenSize = () => {
      if (window.innerWidth >= 768) {
        // Desktop: sidebar always open, main content pushed right
        sidebar.classList.add("is-open");
        sidebarToggleOpen.classList.add("hidden");
        mainContent.classList.remove("ml-0");
        mainContent.classList.add("ml-64");
        if (searchBox) {
          searchBox.classList.remove("hidden");
        }
      } else {
        // Mobile: sidebar closed by default
        sidebar.classList.remove("is-open");
        sidebarToggleOpen.classList.remove("hidden");
        mainContent.classList.remove("ml-64");
        mainContent.classList.add("ml-0");
        if (searchBox) {
          searchBox.classList.remove("hidden");
        }
      }
    };

    // Initial adjustment
    adjustSidebarForScreenSize();

    // Adjust on window resize
    window.addEventListener("resize", adjustSidebarForScreenSize);
  }

  // Dropdown functionality (if you have dropdowns in your navbar)
  const dropdownTriggers = document.querySelectorAll('[data-dropdown-trigger]');
  
  dropdownTriggers.forEach(trigger => {
    const dropdown = document.querySelector(`[data-dropdown="${trigger.dataset.dropdownTrigger}"]`);
    
    if (dropdown) {
      trigger.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('show');
      });
    }
  });

  // Close dropdowns when clicking outside
  document.addEventListener('click', () => {
    const openDropdowns = document.querySelectorAll('[data-dropdown].show');
    openDropdowns.forEach(dropdown => {
      dropdown.classList.remove('show');
    });
  });

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
});