
export default class ToggleMenu {
  constructor(element) {

  	let menu = element.getElementsByClassName('o-main-menu')[0]
  	let burger = element.getElementsByClassName('m-burger')[0]
  	let burgerWrapper = element.getElementsByClassName('m-burger__wrapper')[0]
  	let nav = element.getElementsByClassName('o-main-menu__nav')[0]

  	let closeVW = 0
  	let openVW = window.innerWidth

  	function close() {
  		burger.removeAttribute('active')
			menu.removeAttribute('active')
			nav.removeAttribute('active')
			menu.style.width = closeVW + 'px'
  	}

  	function open() {
  		burger.setAttribute('active', 'true')
			menu.setAttribute('active', 'true')
			nav.setAttribute('active', 'true')
			menu.style.width = openVW + 'px'
  	}

  	function toggle() {
  		if (burger.hasAttribute('active')) {
  			close()
  		} else if (!burger.hasAttribute('active')) {
  			open()
  		} else {
  			close()
  		}
  	}
  	
  	burger.addEventListener('click', toggle, false)
	}
}