var insp = {
iTimeInterval : 50,
iMaxZoom : 100, // max zoom
bHZoom : true, // horizontal zoom
bVZoom : true, // vertical zoom
iMode : 2, // mode (1 or 2)
iZStep : 0,
iImgStep : 1,
oPan : null,
iPanWidth : 0,
iPanHeight : 0,
oImgBefore: null,
oImgAfter: null,
oImgSource : null,
// main initialization function
init : function(iMode) {
this.iMode = iMode;
this.oImgSource = document.getElementById('imgsource').children;
this.oPan = document.getElementById('panel');
this.iPanWidth = this.oPan.offsetWidth;
this.iPanHeight = this.oPan.offsetHeight;
// initial properties of first img element
this.oImgBefore = document.createElement('img'); 
this.oImgBefore.src = this.oImgSource[0].src;
this.oImgBefore.style.top = (this.bVZoom ? -this.iMaxZoom : 0) + 'px';
this.oImgBefore.style.left = (this.bHZoom ? -this.iMaxZoom : 0) + 'px';
this.oImgBefore.style.width = (this.bHZoom ? this.iPanWidth + (2 * this.iMaxZoom) : this.iPanWidth) + 'px';
this.oImgBefore.style.height = (this.bVZoom ? this.iPanHeight + (2 * this.iMaxZoom) : this.iPanWidth) + 'px';
this.oImgBefore.style.filter = 'alpha(opacity=1)';
this.oImgBefore.style.opacity = 1;
this.oPan.appendChild(this.oImgBefore);
// initial properties of second img element
this.oImgAfter = document.createElement('img'); 
this.oImgAfter.src = this.oImgSource[1].src;
this.oImgAfter.style.top = '0px';
this.oImgAfter.style.left = '0px';
this.oImgAfter.style.width = this.iPanWidth + 'px';
this.oImgAfter.style.height = this.iPanHeight + 'px';
this.oImgAfter.style.filter = 'alpha(opacity=0)';
this.oImgAfter.style.opacity = 0;
this.oPan.appendChild(this.oImgAfter);
setInterval(insp.run, this.iTimeInterval);
},
// change mode function
changemode : function(){
this.iMode = (this.iMode == 2) ? 1 : 2;
},
// main loop drawing function
run : function(){
if (insp.iMaxZoom > insp.iZStep++) {
if (insp.bHZoom) {
insp.oImgBefore.style.left = (parseInt(insp.oImgBefore.style.left) - 1) + 'px';
insp.oImgBefore.style.width = (parseInt(insp.oImgBefore.style.width) + 2) + 'px';
if (insp.iMode == 2) {
insp.oImgAfter.style.left = (parseInt(insp.oImgAfter.style.left) - 1) + 'px';
insp.oImgAfter.style.width = (parseInt(insp.oImgAfter.style.width) + 2) + 'px';
}
}
if (insp.bVZoom) {
insp.oImgBefore.style.top = (parseInt(insp.oImgBefore.style.top) - 1) + 'px';
insp.oImgBefore.style.height = (parseInt(insp.oImgBefore.style.height) + 2) + 'px';
if (insp.iMode == 2) {
insp.oImgAfter.style.top = (parseInt(insp.oImgAfter.style.top) - 1) + 'px';
insp.oImgAfter.style.height = (parseInt(insp.oImgAfter.style.height) + 2) + 'px';
}
}
if (insp.oImgAfter.filters)
insp.oImgAfter.filters.item(0).opacity = Math.round(insp.iZStep / insp.iMaxZoom * 100);
else
insp.oImgAfter.style.opacity = insp.iZStep / insp.iMaxZoom;
} else {
insp.iZStep = 0;
if (insp.bHZoom) {
if (insp.iMode == 2) {
insp.oImgAfter.style.left = '0px';
insp.oImgAfter.style.width = insp.iPanWidth + 'px';
}
insp.oImgBefore.style.left = (insp.iMode == 2 ? - insp.iMaxZoom : 0) + 'px';
insp.oImgBefore.style.width = (insp.iMode == 2 ? (insp.iPanWidth + (2 * insp.iMaxZoom)) : insp.iPanWidth) + 'px';
}
if (insp.bVZoom) {
if (insp.iMode == 2) {
insp.oImgAfter.style.top = '0px';
insp.oImgAfter.style.height = insp.iPanHeight + 'px';
}
insp.oImgBefore.style.top = (insp.iMode == 2 ? - insp.iMaxZoom : 0) + 'px';
insp.oImgBefore.style.height = (insp.iMode == 2 ? (insp.iPanHeight + (2 * insp.iMaxZoom)) : insp.iPanHeight) + 'px';
}
if (insp.oImgAfter.filters)
insp.oImgAfter.filters.item(0).opacity = 0;
else
insp.oImgAfter.style.opacity = 0;
insp.oImgBefore.src = insp.oImgAfter.src;
insp.oImgAfter.src = insp.oImgSource[++insp.iImgStep % insp.oImgSource.length].src;
}
}
}
// page onload
onload = function() {
insp.init(); // perform initialization
document.getElementById('mode').onclick = function(){ // onclick handling
insp.changemode();
}
}
