const docElt = document.body || document.documentElement;
const getScrollTop = () => {
	let docElt = document.documentElement;
	let bodyElt = document.body;
	return (docElt.scrollTop || bodyElt.scrollTop || window.scrollY || 0);
};


window.addEventListener('sfrdv_showmodal', ({detail}) => {
	const {minutes, agency} = detail;
	modalData.styleObject.top = `${getScrollTop()}px`;
	modalData.contentus = `${minutes} - ${agency}`;
	modalData.shown = true;
	docElt.style.overflow = 'hidden';
});
window.addEventListener('sfrdv_hidemodal', () => {
	modalData.shown = false;
	docElt.style.overflow = 'auto';
});
let modalData = {
	shown : false,
	styleObject : {top : '0px', left : '0px'},
	contentus : 10
};
new Vue({
	el : '#sfrdv-modalcontainer',
	data : modalData,
	methods : {
		onBlabla : function() {
			modalData.contentus = `AAA`;
		},
		closeModal : () => window.dispatchEvent(new CustomEvent('sfrdv_hidemodal'))
	}
});

Vue.component('sfrdv-item', {
	data : function() {
		return (
			{
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
				sMinutes : undefined,
				disabledDates: {
					to: new Date(2019, 11, 15),
					// customPredictor: function(date) {
					//   if(date.getDate() % 5 == 0){
					// 	return true
					//   }
					// }
				  }
			}
		);
	},
	props : ['agency'],
	components: {
		vuejsDatepicker
	},
	computed: {
		sDisponibility : function() {
			return (this.disponibilities.find(d => d.day == this.sDay) ||  {day : '', minutes : []});
		},
		sDate : function() {
			if (!this.sDay || !this.sMinutes)
				return;
			let [day, month, year] = this.sDay.split('/');
			let minutes = this.sMinutes % 60;
			let hours = Math.floor((this.sMinutes - minutes) / 60);
			let datus = new Date(year, month - 1, day, hours, minutes);
			return datus;
		}
	},
	methods: {
		onSelectDate : function(e) {
			this.message = "Choix de date...";
			this.isinline = true;
			this.step = 1;
			this.sDay = (new Date(e)).toLocaleDateString('FR-fr');
		},
		onSelectMinutes : function(e) {
			const minutes = parseInt(e.target.innerText);
			this.sMinutes = minutes;
			this.message = "MODALUS";
			window.dispatchEvent(new CustomEvent('sfrdv_showmodal', {
				detail : {
					minutes,
					agency : this.agency
				}
			}));
		}
	},
	template : /*html*/`
		<div class="sfrdv-element" v-bind:title="message">
			Agence : {{agency}}
			{{message}}
			<vuejs-datepicker
				:language="fr"
				calendar-class="sfrdv-datepicker"
				input-class="sfrdv-dateinput"
				wrapper-class="sfrdv-datepickerwrapper"
				@selected="onSelectDate"
				:inline="isinline"
				:disabled-dates="disabledDates"
			></vuejs-datepicker>
			<div v-if="step == 1 && !!sDay">
				CHOIX HEURE pour la date {{sDisponibility.day}}
				<li v-for="hour in sDisponibility.minutes" @click="onSelectMinutes">
					{{hour}} minutes
				</li>
			</div>
		</div>
	`
});
new Vue({el: '#sfrdv-app'});