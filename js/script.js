let buildings_menu = document.querySelectorAll('.header__menu_item');

if(buildings_menu)
{
    let buildings = document.querySelectorAll('.header__menu_buildings');
    for(let i = 0; i < buildings_menu.length; i++)
    {
        buildings_menu[i].onmouseover = function()
        {
            buildings[i].removeAttribute('hidden');
        }
        buildings_menu[i].onmouseout = function()
        {
            buildings[i].setAttribute('hidden', true);
        }
    }
}

$('#form').submit(function(e)
{
	let form = $('#form')[0];
	let phone = $('#phone')[0].value;
	$.post('/send.php', {'phone': $('#phone')[0].value}, function(data){
		$('#top_text')[0].setAttribute('hidden', true);
		$('#phone')[0].setAttribute('hidden', true);
		$('#form_submit')[0].setAttribute('hidden', true);
		$('#bottom_text')[0].setAttribute('hidden', true);
		$('#success')[0].removeAttribute('hidden');
		return false;
	});
	return false;
})

/*let buildings_menu = document.querySelectorAll('.header__menu_item_button');

if(buildings_menu)
{
    let buildings = document.querySelectorAll('.header__menu_buildings');
    for(let i = 0; i < buildings_menu.length; i++)
    {
        buildings_menu[i].onmouseover = function()
        {
            buildings[i].removeAttribute('hidden');
        }
        buildings_menu[i].onmouseout = function()
        {
            buildings[i].setAttribute('hidden', true);
        }
    }
}*/




/*let form = document.querySelector('.main__slide1_form');

if(form)
{
    form.onsubmit = function()
    {
        let phone = document.querySelector('.main__slide1_form_phone');
		let data = new FormData(form);
		let responce = fetch('send.php', {
            method: 'POST',
            body: data,
        });  
        return false;
    }
}*/

/*let slide3_items = document.querySelectorAll('.main__slide3_img');

if(slide3_items)
{
    let body = document.body;
    for(let i = 0; i < slide3_items.length - 1; i++)
    {
        center1_X = slide3_items[i].getBoundingClientRect().left - scrollX;// + slide3_items[i].getBoundingClientRect().width/2; 
        center1_Y = slide3_items[i].getBoundingClientRect().top - scrollY;// + slide3_items[i].getBoundingClientRect().height/2;
        center2_X = slide3_items[i + 1].getBoundingClientRect().left + slide3_items[i + 1].getBoundingClientRect().width/2;
        center2_Y = slide3_items[i + 1].getBoundingClientRect().top + slide3_items[i + 1].getBoundingClientRect().height/2;
        body.insertAdjacentHTML("beforeend", "<div class=\"line\" style=\"top: " + center1_Y + "px;left: " + center1_X + "px\"></div>")
    }
}
*/