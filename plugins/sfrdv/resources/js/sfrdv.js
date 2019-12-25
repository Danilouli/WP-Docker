console.log("BONJOUR!");

let appData = {
	message: 'Hello Vue!',
	fr: vdp_translation_fr.js,
	isinline: true,
	step : 0,
	disponibilities : [
		{
			day : "19/12/2019",
			minutes : [10*60, 14*60, 18*60]
		},
		{
			day : "16/12/2019",
			minutes : [8*60, 12*60, 20*60]
		}
	],
	sDay : undefined,
	sMinutes : undefined
};

let app = new Vue({
	el: '#sfrdv-app',
 	data : appData,
	components: {
		vuejsDatepicker
	},
	computed: {
		sDisponibility : () => {
			console.log('afaf');
			return (appData.disponibilities.find(d => d.day == appData.sDay) ||  {day : '', minutes : []});
		},
		sDate : () => {
			if (!appData.sDay || !appData.sMinutes)
				return;
			let [day, month, year] = appData.sDay.split('/');
			let minutes = appData.sMinutes % 60;
			let hours = Math.floor((appData.sMinutes - minutes) / 60);
			console.log({hours, minutes, k : appData.sMinutes});
			let datus = new Date(year, month - 1, day, hours, minutes);
			console.log('datus', datus);
			return datus;
		}
	},
	methods: {
		onSelectDate : e => {
			appData.message = "Choix de date...";
			appData.isinline = true;
			appData.step = 1;
			appData.sDay = (new Date(e)).toLocaleDateString('FR-fr');
		},
		onSelectMinutes : e => {
			console.log('onSelectMinutes e', e.target.innerText);
			let minutes = parseInt(e.target.innerText);
			appData.sMinutes = minutes;
		}
	}
});

let modalData = {
	shown : false,
	styleObject : {top : '0px', left : '0px'},
	rawContent : /*html*/`<span>COCO</span>`
};
let modalContainer = new Vue({
	el : '#sfrdv-modalcontainer',
	data : modalData
});

let docElt = document.documentElement;
window.addEventListener('sfrdv_showmodal', () => {
	modalData.shown = true;
	docElt.style.overflow = 'hidden';
	let scrollTop = docElt.scrollTop;
	modalData.styleObject.top = `${scrollTop}px`;
});

window.addEventListener('sfrdv_hidemodal', () => {
	modalData.shown = false;
	docElt.style.overflow = 'auto';
});