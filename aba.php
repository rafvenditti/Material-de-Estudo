<div id="primary" class="content-area">
    <main id="tab" class="site-main" role="main">

        <ul id="tabs">
            <li id="tab-content-recent" class="active-tab">
                <a href="javascript:viewTab('content-recent');">Recent</a>
            </li>
            <li id="tab-content-popular">
                <a href="javascript:viewTab('content-popular');">Popular</a>
            </li>
            <li id="tab-content-comments">
                <a href="javascript:viewTab('content-comments');">Comments</a>
            </li>
        </ul>
        
        <div id="contents-container">
            <div id="content-recent">
                CONTEUDO - Content for Recent tab.
            </div>
            <div id="content-popular" style="display: none;">
                CONTEUDO - Content for Popular tab.
            </div>
            <div id="content-comments" style="display: none;">
                CONTEUDO - Content for Comments tab.
            </div>
        </div>

    </main>
    <!-- #main -->
</div>
<!-- #primary -->
<!---------------------------------------------HTML---------------------------------------------------------------->

<!---------------------------------------------SCRIPT----------------------------------------------------------------> 
<script>
// Function to view tab
function viewTab(tabId) {
    // Get all child elements of "contents-container"
	console.log(jQuery('#contents-container'));
    var elements = jQuery('#contents-container').children();
    // Loop through them all
    for (var i=0, end=elements.length; i<end; i++) {
        // Is clicked tab
        if (tabId == elements[i].id) {
            // - Show element
            jQuery(elements[i]).show();
            // - Make sure css is correct for tab
            jQuery('tab-'+ elements[i].id).addClass('active-tab');
        }
        // Is not the clicked tab
        else {
            // - Hide
            jQuery(elements[i]).hide();
            // - Make sure css is correct for tab
            jQuery('tab-'+ elements[i].id).removeClass('active-tab');
        }
    }
}
</script>
<!---------------------------------------------SCRIPT---------------------------------------------------------------->



<!--------------------------------------------STYLE----------------------------------------------------------------->
<style> 
main#tab {
width: 300px;
}

ul#tabs {
list-style: none;
margin: 0;
}

#tabs li {
float: left;
padding: 10px;
background: #5BD56A;
border-radius: 10px 10px 0 0;
margin: 1px;
}

#contents-container {
width: 249px;
background: #51CACA;
overflow: hidden;
height: 300px;
}    
</style>
<!--------------------------------------------STYLE----------------------------------------------------------------->
