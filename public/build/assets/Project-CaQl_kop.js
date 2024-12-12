import{k as a,s as E,o as u,f as d,b as t,g as _,t as T,F,p as O,q as L,d as B,i as C,m as q,E as W,a as k,u as J,w as I,Z}from"./app-Ck1xgEYH.js";import{_ as G}from"./AuthenticatedLayout-Bs5QtO1f.js";import"./ApplicationLogo-OnWjoh5A.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const H={class:"container mx-auto p-6"},K={key:0,class:"text-center text-xl text-gray-500"},Q={key:1,class:"text-center text-xl text-red-600"},X={key:2,class:"space-y-4"},Y={class:"text-lg font-semibold"},S=["onClick"],z={__name:"ProjectsList",setup(U){const f=a([]),n=a(!0),p=a(!1),y=a(""),w=async()=>{try{const r=await L.get("/a/project/load");f.value=r.data.projects,n.value=!1}catch(r){p.value=!0,y.value=r.message||"Failed to load items.",n.value=!1}},x=async r=>{try{let i=Math.floor(Math.random()*2e6);await L.delete(`/a/${i}/delete/project/${r}`),w()}catch(i){console.error("Error deleting item:",i)}};return E(()=>{w()}),(r,i)=>(u(),d("div",H,[i[0]||(i[0]=t("h1",{class:"text-3xl font-bold text-center mb-6"},"Projects List",-1)),n.value?(u(),d("div",K," Loading... ")):_("",!0),p.value?(u(),d("div",Q,[t("p",null,"Error: "+T(y.value),1)])):_("",!0),!n.value&&!p.value?(u(),d("ul",X,[(u(!0),d(F,null,O(f.value,m=>(u(),d("li",{key:m.id,class:"bg-gray-100 p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200"},[t("p",Y,[B(T(m.address)+" ",1),t("button",{onClick:R=>x(m.id),class:"bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none float-right"}," Delete ",8,S)])]))),128))])):_("",!0)]))}},ee={class:"container mx-auto p-6"},te={class:"flex flex-col items-center justify-center space-y-6"},se={class:"w-full max-w-md"},le={class:"w-full max-w-md"},oe={class:"w-full max-w-md"},ae={class:"w-full max-w-md"},ne={key:0,class:"mb-2"},re=["src"],ie={class:"w-full max-w-md"},ue={key:0,class:"mb-2"},de=["src"],ce={class:"w-full max-w-md"},ge=["src","alt"],fe={__name:"ProjectsUpload",setup(U){const f=a(null),n=a(null),p=a(null),y=a(null),w=a([]),x=a([]),r=a(""),i=a(0),m=a(0),R=o=>{const e=o.target.files[0];e&&e.type.startsWith("image/")?P(e,s=>{f.value=s,n.value=$(s,e.name)}):alert("Please select an image file.")},A=o=>{const e=o.target.files[0];e&&e.type.startsWith("image/")?P(e,s=>{p.value=s,y.value=$(s,e.name)},1e3):alert("Please select an image file.")},D=o=>{const e=o.target.files;for(let s=0;s<e.length;s++){const l=e[s];l.type.startsWith("image/")?P(l,g=>{w.value.push(g),x.value.push($(g,l.name))}):alert("Please select an image file.")}},P=(o,e,s=800)=>{const l=new FileReader;l.onload=g=>{const c=new Image;c.onload=()=>{const b=document.createElement("canvas"),N=b.getContext("2d");let v=c.width,h=c.height;v>h?v>s&&(h=Math.round(h*=s/v),v=s):h>s&&(v=Math.round(v*=s/h),h=s),b.width=v,b.height=h,N.drawImage(c,0,0,v,h);const V=b.toDataURL(o.type);e(V)},c.src=g.target.result},l.readAsDataURL(o)},$=(o,e)=>{const s=o.split(","),l=s[0].match(/:(.*?);/)[1],g=atob(s[1]);let c=g.length;const b=new Uint8Array(c);for(;c--;)b[c]=g.charCodeAt(c);return new File([b],e,{type:l})},M=async()=>{if(!r.value){alert("Address Required");return}if(!i.value){alert("Units Required");return}if(!m.value){alert("Type Required");return}if(!n.value){alert("outsideTransparentFile Required");return}y.value||alert("outsideLifestyle Required");const o=[];o.push({address:r.value,units:i.value,type:m.value,outsideTransparent:await j(n.value),outsideLifestyle:await j(y.value)});const e=[];for(const s of x.value)e.push(await j(s));o.push({inside:e}),await L.post("/a/project/upload",JSON.stringify(o),{headers:{"Content-Type":"application/json"}}).then(s=>{const l=s.data.message;alert(JSON.stringify(l,null,2)),r.value="",i.value="",f.value=null,n.value=[],p.value=[],y.value=[],x.value=[],w.value=[]}).catch(s=>{console.error(s)})},j=o=>new Promise((e,s)=>{const l=new FileReader;l.readAsDataURL(o),l.onload=()=>e(l.result),l.onerror=g=>s(g)});return(o,e)=>(u(),d("div",ee,[e[10]||(e[10]=t("h2",{class:"text-2xl font-bold text-gray-800 mb-6"},"Add New Projects",-1)),t("div",te,[t("div",se,[e[3]||(e[3]=t("label",{class:"block mb-2 text-gray-700"},"Project Full Address:",-1)),C(t("input",{type:"text","onUpdate:modelValue":e[0]||(e[0]=s=>r.value=s),class:"border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500",required:""},null,512),[[q,r.value]])]),t("div",le,[e[4]||(e[4]=t("label",{class:"block mb-2 text-gray-700"},"Project Units Amount:",-1)),C(t("input",{type:"number","onUpdate:modelValue":e[1]||(e[1]=s=>i.value=s),class:"border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500",required:""},null,512),[[q,i.value]])]),t("div",oe,[e[6]||(e[6]=t("label",{class:"block mb-2 text-gray-700"},"Project Type:",-1)),C(t("select",{"onUpdate:modelValue":e[2]||(e[2]=s=>m.value=s),class:"border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"},e[5]||(e[5]=[t("option",{value:"com"},"Commercial",-1),t("option",{value:"res"},"Residential",-1),t("option",{value:"otr"},"Other",-1)]),512),[[W,m.value]])]),t("div",ae,[e[7]||(e[7]=t("label",{class:"block mb-2 text-gray-700"},"Outside Transparent Picture:",-1)),f.value?(u(),d("div",ne,[t("img",{src:f.value,alt:"Outside Transparent",class:"max-w-full h-auto rounded-lg shadow-lg"},null,8,re)])):_("",!0),t("input",{type:"file",onChange:R,class:"border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500",required:""},null,32)]),t("div",ie,[e[8]||(e[8]=t("label",{class:"block mb-2 text-gray-700"},"Outside Lifestyle Picture:",-1)),p.value?(u(),d("div",ue,[t("img",{src:p.value,alt:"Outside Lifestyle",class:"max-w-full h-auto rounded-lg shadow-lg"},null,8,de)])):_("",!0),t("input",{type:"file",onChange:A,class:"border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500",required:""},null,32)]),t("div",ce,[e[9]||(e[9]=t("label",{class:"block mb-2 text-gray-700"},"Inside Pictures:",-1)),(u(!0),d(F,null,O(w.value,(s,l)=>(u(),d("div",{key:l,class:"mb-2"},[t("img",{src:s,alt:"Inside Picture "+(l+1),class:"max-w-full h-auto rounded-lg shadow-lg"},null,8,ge)]))),128)),t("input",{type:"file",onChange:D,multiple:"",class:"border border-gray-300 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500",required:""},null,32)]),t("button",{onClick:M,class:"bg-blue-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"}," Upload Images ")])]))}},pe={class:"py-12"},me={class:"mx-auto max-w-7xl sm:px-6 lg:px-8"},ve={class:"overflow-hidden bg-white shadow-sm sm:rounded-lg"},he={class:"p-6 text-gray-900"},_e={__name:"Project",setup(U){return(f,n)=>(u(),d(F,null,[k(J(Z),{title:"Dashboard"}),k(G,null,{header:I(()=>n[0]||(n[0]=[t("h2",{class:"text-xl font-semibold leading-tight text-gray-800"}," Projects ",-1)])),default:I(()=>[t("div",pe,[t("div",me,[t("div",ve,[t("div",he,[k(z),k(fe)])])])])]),_:1})],64))}};export{_e as default};