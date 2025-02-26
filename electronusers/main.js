//Aplicacion general
const app=require('electron').app;
//Uso de las pantallas del sistema
const BrowserWindow=require('electron').BrowserWindow;
//Ruta de la carpeta base
const path=require('path');
//URL de las paginas
const url=require('url');

//ECMASCRIPT 6 -JS
let pantallasPrincipal;

function muestraPantallaPrincipal(){
	pantallasPrincipal=new BrowserWindow({width:620,height:825});
	pantallasPrincipal.loadURL(url.format({
		//join: concatenar cadenas
		pathname:path.join(__dirname,'index.html'),
		protocol:'file',
		slashes: true
	}));
	//clic derecho, inspeccionar en chrome
	//pantallasPrincipal.webContents.openDevTools();
	pantallasPrincipal.show();

}

app.on('ready',muestraPantallaPrincipal);