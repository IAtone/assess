  // var oDate = new Date();
        // oDate.setDate(oDate.getDate() + 7)
        // var path = '/'
        // // var domain = 'www.hzbiz.net'
        // document.cookie= 'username='+encodeURIComponent('应煜鑫1111')+';expires='+oDate+';path='+path+";secure"
        // alert(decodeURIComponent(document.cookie))
        

        function setCookie(name,value,expires,path,domain,secure){
             var cookieText =name+'='+encodeURIComponent(value);
             if(expires instanceof Date){
             	cookieText+=';expires='+expires;
             }
             if(path){
             	cookieText+=';path='+path;
             }
             if(domain){
             	cookieText+=';domain='+domain;
             }
             if(secure){
             	cookieText+=';secure';
             }
             document.cookie = cookieText;
        }

        // var oDate = new Date();
        // oDate.setDate(oDate.getDate() + 7)
        // setCookie('user','yyx219',oDate,'/')
        function getCookie(name){
        	 var cookieStart = document.cookie.indexOf(name+"=");
        	 var cookieValue = null;
        	 if (cookieStart>-1) {
        	 	var cookieEnd = document.cookie.indexOf(';',cookieStart);
        	 	if (cookieEnd==-1) {
        	 		cookieEnd = document.cookie.length;
        	 	}
        	 	cookieValue = decodeURIComponent(document.cookie.substring(cookieStart+(name.length+1),cookieEnd))
        	 }
        	 return cookieValue
        }
        


        function removeCookie(name,path){
        	document.cookie = name+"=;expires="+new Date(0)+";path="+path;
        }
        
        // removeCookie("user",'/')
        // alert(getCookie('user'))