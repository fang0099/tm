

seajs.config({

	alias : {
		'global'	: 'global.js',
		'router'	: 'router.js',
		'popup'		: 'vendor/jquery.popupoverlay.js',
		'mustache'	: 'vendor/mustache.js',
		'render'	: 'render.js'
	},

	paths : {
		'vendor'	: 'vendor'
	}
});

seajs.use('page');
seajs.use('router');