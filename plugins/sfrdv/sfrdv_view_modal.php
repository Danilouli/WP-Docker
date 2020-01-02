<div v-if="shown" v-bind:style="styleObject" class="sfrdv-reset" id="sfrdv-modalcontainer">
	<div id="sfrdv-modal">
		<div @click="onBlabla">{{contentus}}</div>
		<div @click="closeModal">CLOSE</div>
	</div>
</div>
<style>
	#sfrdv-modal {
		position : absolute;
		z-index : 1000;
		color : red;
		font-size : 30;
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
		display : flex;
		justify-content : center;
		align-items : center;
	}
</style>