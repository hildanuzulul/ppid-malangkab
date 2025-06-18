document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
	const footer = document.querySelector('.footer');
    const toggler = document.querySelector('.sidebar-toggler');
    const mainContent = document.querySelector('.main-content');
    
    // Cek state dari localStorage
    const sidebarState = localStorage.getItem('sidebarState');
    
    // Set initial state
    if (sidebarState === 'collapsed') {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
		footer.classList.add('expanded');
    }
    
    // Toggle sidebar
    toggler.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        sidebar.classList.toggle('show');
        mainContent.classList.toggle('expanded');
		footer.classList.toggle('expanded');
        
        // Simpan state di localStorage
        const isCollapsed = sidebar.classList.contains('collapsed');
        localStorage.setItem('sidebarState', isCollapsed ? 'collapsed' : 'expanded');
    });
    
    // Tutup sidebar saat mengklik di luar sidebar (untuk mobile)
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 768) {
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggler = toggler.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickOnToggler && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                sidebar.classList.add('collapsed');
                mainContent.classList.add('expanded');
				footer.classList.add('expanded');
                localStorage.setItem('sidebarState', 'collapsed');
            }
        }
    });
});
