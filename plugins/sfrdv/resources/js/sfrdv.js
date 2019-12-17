console.log("BONJOUR!");
let data = {
	message: 'Hello Vue!',
	fr: vdp_translation_fr.js,
	isinline: true
};
let app = new Vue({
	el: '#sfrdv-app',
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