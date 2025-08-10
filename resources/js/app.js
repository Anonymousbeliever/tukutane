import "./bootstrap" // Keep this for Laravel Breeze's default JS

document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.getElementById("sidebar")
  const mainContent = document.getElementById("main-content")
  const sidebarToggleOpen = document.getElementById("sidebar-toggle-open")
  const sidebarToggleClose = document.getElementById("sidebar-toggle-close")

  if (sidebar && mainContent && sidebarToggleOpen && sidebarToggleClose) {
    // Function to open sidebar
    const openSidebar = () => {
      sidebar.classList.remove("-translate-x-full")
      sidebar.classList.add("translate-x-0")
      // For mobile, hide the open button when sidebar is open
      if (window.innerWidth < 768) {
        sidebarToggleOpen.classList.add("hidden")
      }
    }

    // Function to close sidebar
    const closeSidebar = () => {
      sidebar.classList.remove("translate-x-0")
      sidebar.classList.add("-translate-x-full")
      // For mobile, show the open button when sidebar is closed
      if (window.innerWidth < 768) {
        sidebarToggleOpen.classList.remove("hidden")
      }
    }

    // Event listeners for toggle buttons
    sidebarToggleOpen.addEventListener("click", openSidebar)
    sidebarToggleClose.addEventListener("click", closeSidebar)

    // Close sidebar when clicking outside on mobile
    document.addEventListener("click", (event) => {
      const isClickInsideSidebar = sidebar.contains(event.target)
      const isClickOnOpenToggle = sidebarToggleOpen.contains(event.target)
      const isClickOnCloseToggle = sidebarToggleClose.contains(event.target)

      // Only close if sidebar is open, click is outside sidebar and not on a toggle button, and it's a mobile view
      if (
        !sidebar.classList.contains("-translate-x-full") &&
        !isClickInsideSidebar &&
        !isClickOnOpenToggle &&
        !isClickOnCloseToggle &&
        window.innerWidth < 768 // Tailwind's 'md' breakpoint is 768px
      ) {
        closeSidebar()
      }
    })

    // Initialize sidebar state on load and resize
    const adjustSidebarForScreenSize = () => {
      if (window.innerWidth >= 768) {
        // On desktop, sidebar should always be open and toggle button hidden
        sidebar.classList.remove("-translate-x-full")
        sidebar.classList.add("translate-x-0")
        sidebarToggleOpen.classList.add("hidden")
        mainContent.classList.remove("ml-0")
        mainContent.classList.add("md:ml-64") // Ensure main content is pushed
      } else {
        // On mobile, sidebar should be closed by default and toggle button visible
        sidebar.classList.add("-translate-x-full")
        sidebar.classList.remove("translate-x-0")
        sidebarToggleOpen.classList.remove("hidden")
        mainContent.classList.remove("md:ml-64")
        mainContent.classList.add("ml-0") // Ensure main content is not pushed
      }
    }

    // Initial adjustment
    adjustSidebarForScreenSize()

    // Adjust on window resize
    window.addEventListener("resize", adjustSidebarForScreenSize)
  }
})
