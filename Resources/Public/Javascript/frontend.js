var con_nj_tutorials = '.tx_njtutorials';
var con_nj_tutorials_tutorial = con_nj_tutorials+'.tutorial';
var con_nj_tutorials_tutorial_focus = con_nj_tutorials_tutorial+'.focus'

$(document).ready(function()
{	
	$(document).on("click", con_nj_tutorials_tutorial_focus+' .meta span a', function(e)
	{
		e.preventDefault();
		$position = $('a[name="comments"]').position();
		n1scrollToPosition($position.top)
	});
});