function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}

$('[name=title], [name=name]').on('keyup', function ()
{
    var title = $(this).val();

    var slug = convertToSlug(title);

    $('[name=slug]').val(slug);

    $('.slug-preview').text(slug);

});

// Admin side menu. It opens active box.
$(document).ready(function() {
	$('.sidebar-menu li.active')
		.parents('.treeview').addClass('active')
		.find('ul.treeview-menu').attr('style', 'display:block');
});