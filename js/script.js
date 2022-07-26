let buildings_menu = document.querySelectorAll('.header__menu_item_button');

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

$(document).ready(function ()
{
    $('#form').submit(function(e)
    {
		let form = $('#form')[0];
		let data = new FormData(form);
		$.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/send.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success: function () 
			{
                console.log("SUCCESS : ");
            },
            error: function (e) 
			{
                console.log("ERROR : ");
            }
        });
        return false;
    })
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
		let responce = fetch('send.php', {
            method: 'POST',
            body: new FormData(form),
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