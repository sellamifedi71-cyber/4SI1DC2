// JavaScript Document
function verif()
{nm=document.getElementById("nm").value
 lyce=document.getElementById("l").value
 ta=document.getElementById("ta").value
 tya=document.getElementById("tya").selectedIndex
 d=document.getElementById("da").value
 lieu=document.getElementById("li").value
 if(nm.length!=scount(nm.toUpperCase,"A","Z") || nm.length<10)
	 {alert("verifier to nom du membere")
	  return false
	 }
 else if(l.length!=scount(l.toUpperCase,"A","Z")+scount(l,0,9)|| l.length<10)
	 {alert("veirfier lycee")
	 return false
	 }
 else if(ta.length!=scount(ta.toUpperCase,"A","Z")+scount(ta,0,9)|| ta.length<10)
	 {
		 alert("vider titre de laction")
	 }
 else if(tya=1)
	 {
		 alert("choix obligatoire")
		 return false
	 }
 else if(d>Datenow())
	 {alert("date inccorect")
	 return false
	 }
 else if(lieu.length=scount(lieu.toUpperCase,"A","Z")+scount(lieu,0,9)||lieu.length<15 ||mots(lieu)==false)
	 {alert("lieu inccrieujkhkd")
	  return false
	 
	 
	 }
 else{
	 return true
 }
 
	
}
function scount(ch,a,b)
{nb=0
 for(i=0;i<ch.length;i++)
	 {
		 if(ch[i]>=a && ch[i]<=b)
		 {
			 nb=nb+1
		 }
		 
	 }
	 
return nb
	
}


function mots(ch):
{nb=0
	for(i=0;i<ch.length;i++)
		{if(ch[i]="" && ch[i+1]!="")
			{
				nb=nb+1
			}
			
		}
 return nb>=3
}