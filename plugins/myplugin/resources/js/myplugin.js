console.log("BONJOUR!");
var data = {
	message: 'Hello Vue!',
	fr: vdp_translation_fr.js,
	isinline: true
};
var app = new Vue({
	el: '#mp-app',
 	data,
	components: {
		vuejsDatepicker
	},
	methods: {
		onSelectDate : e => {
			console.log("Date selected", e);
			data.message = "JUJU";
			data.isinline = true;
		}
	}
});