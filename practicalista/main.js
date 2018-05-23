const {app, BrowserWindow} = require('electron') 
const path = require('path')
const url = require('url')
//Constantes para PDF
const electron = require('electron');
//sistema de archivos
const fs = require('fs');
//acceso al sistema operativo
const os = require('os');
//para declarar una funcion remota
const ipc = electron.ipcMain;
//acceso a la terminal-linea de comandos
const shell = electron.shell;

let pantallaPrincipal;

function muestraPantallaPrincipal(){
	pantallaPrincipal = new BrowserWindow({width:320,height:425});
	pantallaPrincipal.loadURL(url.format({pathname: path.join(__dirname,'index.html'),
										  protocol: 'file',
										  slashes: true}))
	//pantallaPrincipal.webContent.openDevTools();
	pantallaPrincipal.show();
}
app.on('ready',muestraPantallaPrincipal)