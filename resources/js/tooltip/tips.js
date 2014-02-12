var mouse_X;
var mouse_Y;
var tip_active=0;
var tip_num=0;
var ie = document.all?true:false;

function update_tip_pos(){
X=mouse_X;
Y=mouse_Y;

SX=0;
SY=0;
if (ie) {
SX = self.screenLeft;
SY = self.screenTop;
}
else {
SX=self.screenX;
SY=self.screenY;
}
if (SX<0) {SX=0}
if (SY<0) {SY=0}

if (self.innerHeight)
{
	ix = self.innerWidth;
	iy = self.innerHeight;
}
else if (document.documentElement && document.documentElement.clientHeight)
{
	ix = document.documentElement.clientWidth;
	iy = document.documentElement.clientHeight;
}
else if (document.body)
{
	ix = document.body.clientWidth;
	iy = document.body.clientHeight;
}

MX=ix-SX;
MY=iy-SY;

X=X+18;

if (X+430>MX) {X=MX-430;Y=Y+20}

DH=document.getElementById('Tip'+tip_num).clientHeight;
if (MY-DH+SY<Y-document.documentElement.scrollTop) {Y=Y-DH-40}

document.getElementById('Tip'+tip_num).style.left = X+'px';
document.getElementById('Tip'+tip_num).style.top  = Y+'px';
}
if (!ie) document.captureEvents(Event.MOUSEMOVE)
document.onmousemove = getMouseXY;
function getMouseXY(e) {

if (ie) {
mouse_X = event.clientX + document.documentElement.scrollLeft;
mouse_Y = event.clientY + document.documentElement.scrollTop;
}
else {
mouse_X = e.pageX;
mouse_Y = e.pageY;
}
if (mouse_X < 0){mouse_X = 0;}
if (mouse_Y < 0){mouse_Y = 0;}
if(tip_active){update_tip_pos();}
}

function show_tip(num)
{
	tip_num=num;
	if (document.getElementById('Tip'+tip_num).innerHTML=='') {return}
	update_tip_pos();
	tip_active = 1;
	document.getElementById('Tip'+tip_num).style.visibility = "visible";
}
function hide_tip(num)
{
	tip_active = 0;
	document.getElementById('Tip'+tip_num).style.visibility = "hidden";
}