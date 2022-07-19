let buildings_menu = document.querySelector('.header__menu_item_button')

if(buildings_menu)
{
    buildings_menu.onclick = function()
    {
        let buildings = document.querySelector('.header__menu_buildings');
        if(buildings.getAttribute('hidden'))
        {
            buildings.removeAttribute('hidden');           
        }
        else
        {
            buildings.setAttribute('hidden', true);
        }
    }
}