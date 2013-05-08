function sel(val,obj){
	for (i=0;i<obj.length;i++){
		if (obj[i]==val){
			return i;
			}
		}
	if (i==obj.length){return 0;}
}

function selbox(val,obj){
	for (i=0;i<obj.length;i++){
		if (obj.options[i].value==val){
			return i;
			}
		}
	if (i==obj.length){return 0;}
}

function clear(obj){

len=obj.length;
for (i = 0; i < len; i ++){
	obj.options[0]=null;
	}
}

function FullP(obj){
	for (i=0;i<P.length;i++){
		obj.options.add(new Option(P[i],P[i]))
	}
}

function FullC(obj1,obj2,val){
	clear(obj1);
	clear(obj2);
	if (val!=""){
		m=sel(val,P);
		for (i=0;i<C[m].length;i++){
			obj1.options.add(new Option(C[m][i],C[m][i]));
		}
	FullD(obj2,C[m][0]);
	}
	else{
		obj1.options.add(new Option("请选择"," "));
		obj2.options.add(new Option("请选择"," "));		
	}
}

function FullC2(obj){
for (i=0;i<P.length;i++){
		for (j=0;j<C[i].length;j++){
			obj.options.add(new Option(C[i][j],C[i][j]));
			}
	}
}

function FullD(obj,val){

m=-1;
n=-1;
for (i=0;i<P.length;i++){
	for (j=0;j<C[i].length;j++){
		if (C[i][j]==val){
			m=i;
			n=j;
		}
	}
}

clear(obj);
if (m!=-1&&n!=-1){
obj.options.add(new Option("",""));
if(D[m][n]!=null)
{
for (i=0;i<D[m][n].length;i++){
obj.options.add(new Option(D[m][n][i],D[m][n][i]));
}
}
else{
obj.options.add(new Option("",""));
}
}
}

function sed(obj,val){
obj.options[selbox(val,obj)].selected=true;
}

function Full(Vp,Vc,Vd,Op,Oc,Od){
if (selbox(Vp,Op)!=0){sed(Op,Vp);}
FullC(Oc,Od,Vp);
if (selbox(Vc,Oc)!=0){sed(Oc,Vc);}
FullD(Od,Vc);
if (selbox(Vd,Od)!=0){sed(Od,Vd);}
}

function Full2(Vc,Vd,Oc,Od){
if (selbox(Vc,Oc)!=0){sed(Oc,Vc);}
FullD(Od,Vc);
if (selbox(Vd,Od)!=0){sed(Od,Vd);}
}