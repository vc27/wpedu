/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-search' : '&#xf002;',
			'icon-lifebuoy' : '&#xe002;',
			'icon-users' : '&#xe003;',
			'icon-cross' : '&#xe004;',
			'icon-download' : '&#xe000;',
			'icon-arrow-right' : '&#xe005;',
			'icon-arrow-left' : '&#xe006;',
			'icon-twitter' : '&#xe007;',
			'icon-ok' : '&#xf00c;',
			'icon-reorder' : '&#xf0c9;',
			'icon-wordpress' : '&#xe009;',
			'icon-libreoffice' : '&#xe00a;',
			'icon-location' : '&#xe00b;',
			'icon-remove' : '&#xf00d;',
			'icon-calendar' : '&#xf073;',
			'icon-envelope' : '&#xf003;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};