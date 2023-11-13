jQuery(document).ready(function($) {
    // Hide all tab content initially
    $('.custom-product-tabs .tab-pane').hide();
    
    // Show the first tab by default
    $('.custom-product-tabs .tab-pane:first').show();
    
    // Add click event handler for the tab links
    $('.custom-product-tabs .nav-tabs li a').click(function() {
        var targetTab = $(this).attr('href');
        
        // Hide all tab content
        $('.custom-product-tabs .tab-pane').hide();
        
        // Show the selected tab content
        $(targetTab).show();
        
        // Remove active class from all tabs
        $('.custom-product-tabs .nav-tabs li').removeClass('active');
        
        // Add active class to the clicked tab
        $(this).parent().addClass('active');
        
        return false;
    });
});
