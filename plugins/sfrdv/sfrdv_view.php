<div id="sfrdv-app" v-bind:title="message">
	Htmlu Contente <?php echo (1+1)?>
	{{message}}
	<vuejs-datepicker
		:language="fr"
		calendar-class="sfrdv-datepicker"
		input-class="sfrdv-dateinput"
		wrapper-class="sfrdv-datepickerwrapper"
		@selected="onSelectDate"
		:inline="isinline"
	></vuejs-datepicker>
	<div v-if="step == 1 && !!sDay">
		CHOIX HEURE pour la date {{sDisponibility.day}}
		<li v-for="hour in sDisponibility.minutes" @click="onSelectMinutes">
			{{hour}}
		</li>
	</div>
</div>
<style>
	.sfrdv-reset {
		max-width : none !important;
		max-height : none;
		margin : 0;
		padding : 0;
	}
	#sfrdv-app {
		position : relative;
		height : 100vh;
	}
	.sfrdv-datepickerwrapper {
		width : 300px;
		position : relative;
	}
	.sfrdv-datepicker {
		position : relative;
		width : 100%;
	}
	#sfrdv-modal {
		position : absolute;
		z-index : 1000;
	}
	#sfrdv-modalbody {
		position : absolute;
		height : 100px;
		width : 100px;
		background-color : red;
	}
	#sfrdv-modalcontainer {
		position : absolute;
		height : 100vh;
		width : 100vw;
		background-color : rgba(70,70,70,0.6);
		z-index : 100;
	}
</style>