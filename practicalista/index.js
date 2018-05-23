const $ = require('jquery');
const {BrowserWindow}=require('electron').remote
const app = require('electron').app
const path = require('path')
const url = require('url')

let pantallaDetalle
var usuarios = new Array(20);

function botonDetalle(){
	//alert(this.id);
	//alert(usuarios[this.id.nombre]);
	require('electron').remote.getGlobal('infoUsuarios').nombre=usuarios[this.id].nombre;
	require('electron').remote.getGlobal('infoUsuarios').genero=usuarios[this.id].genero;
	require('electron').remote.getGlobal('infoUsuarios').foto=usuarios[this.id].foto;
	require('electron').remote.getGlobal('infoUsuarios').direccion=usuarios[this.id].direccion;
	require('electron').remote.getGlobal('infoUsuarios').telefono=usuarios[this.id].telefono;
	
	pantallaDetalle = new BrowserWindow({width:320,height:425});
	pantallaDetalle.loadURL(url.format({
										pathname: path.join(__dirname,'detalleUsuarios.html'),
										protocol: 'file',
										slashes: true
										}));
	pantallaDetalle.webContents.openDevTools();
	pantallaDetalle.show();
}
$("#btnEntrar").on("click",botonDetalle);
inicia();