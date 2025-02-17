/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/category/init.js":
/*!******************************!*\
  !*** ./src/category/init.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _panel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./panel */ "./src/category/panel.tsx");
/* harmony import */ var _panel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_panel__WEBPACK_IMPORTED_MODULE_0__);

const InitCategoryTab = element => {
  const el = jQuery(element);
  const pplNonce = el.data('pplnonce');
  const data = el.data("data");
  const methods = el.data('methods');
  _panel__WEBPACK_IMPORTED_MODULE_0___default()(el[0], {
    pplNonce,
    data,
    methods
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InitCategoryTab);

/***/ }),

/***/ "./src/product/init.js":
/*!*****************************!*\
  !*** ./src/product/init.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _tab__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./tab */ "./src/product/tab.tsx");
/* harmony import */ var _tab__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_tab__WEBPACK_IMPORTED_MODULE_0__);

const InitProductTab = element => {
  const el = jQuery(element);
  const pplNonce = el.data('pplnonce');
  const data = el.data("data");
  const methods = el.data('methods');
  _tab__WEBPACK_IMPORTED_MODULE_0___default()(el[0], {
    pplNonce,
    data,
    methods
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (InitProductTab);

/***/ }),

/***/ "./src/reset-styles.scss":
/*!*******************************!*\
  !*** ./src/reset-styles.scss ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/react-hook-form/dist/index.cjs.js":
/*!********************************************************!*\
  !*** ./node_modules/react-hook-form/dist/index.cjs.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

function e(e){return e&&"object"==typeof e&&"default"in e?e:{default:e}}Object.defineProperty(exports, "__esModule", ({value:!0}));var t=e(__webpack_require__(/*! react */ "react")),r=e=>"checkbox"===e.type,s=e=>e instanceof Date,a=e=>null==e;const n=e=>"object"==typeof e;var i=e=>!a(e)&&!Array.isArray(e)&&n(e)&&!s(e),u=e=>i(e)&&e.target?r(e.target)?e.target.checked:e.target.value:e,o=(e,t)=>e.has((e=>e.substring(0,e.search(/\.\d+(\.|$)/))||e)(t)),l=e=>{const t=e.constructor&&e.constructor.prototype;return i(t)&&t.hasOwnProperty("isPrototypeOf")},d="undefined"!=typeof window&&void 0!==window.HTMLElement&&"undefined"!=typeof document;function c(e){let t;const r=Array.isArray(e);if(e instanceof Date)t=new Date(e);else if(e instanceof Set)t=new Set(e);else{if(d&&(e instanceof Blob||e instanceof FileList)||!r&&!i(e))return e;if(t=r?[]:{},r||l(e))for(const r in e)e.hasOwnProperty(r)&&(t[r]=c(e[r]));else t=e}return t}var f=e=>Array.isArray(e)?e.filter(Boolean):[],m=e=>void 0===e,y=(e,t,r)=>{if(!t||!i(e))return r;const s=f(t.split(/[,[\].]+?/)).reduce(((e,t)=>a(e)?e:e[t]),e);return m(s)||s===e?m(e[t])?r:e[t]:s},p=e=>"boolean"==typeof e;const g={BLUR:"blur",FOCUS_OUT:"focusout",CHANGE:"change"},_={onBlur:"onBlur",onChange:"onChange",onSubmit:"onSubmit",onTouched:"onTouched",all:"all"},v="max",h="min",b="maxLength",x="minLength",V="pattern",A="required",F="validate",S=t.default.createContext(null),w=()=>t.default.useContext(S);var D=(e,t,r,s=!0)=>{const a={defaultValues:t._defaultValues};for(const n in e)Object.defineProperty(a,n,{get:()=>{const a=n;return t._proxyFormState[a]!==_.all&&(t._proxyFormState[a]=!s||_.all),r&&(r[a]=!0),e[a]}});return a},k=e=>i(e)&&!Object.keys(e).length,C=(e,t,r,s)=>{r(e);const{name:a,...n}=e;return k(n)||Object.keys(n).length>=Object.keys(t).length||Object.keys(n).find((e=>t[e]===(!s||_.all)))},E=e=>Array.isArray(e)?e:[e],O=(e,t,r)=>!e||!t||e===t||E(e).some((e=>e&&(r?e===t:e.startsWith(t)||t.startsWith(e))));function j(e){const r=t.default.useRef(e);r.current=e,t.default.useEffect((()=>{const t=!e.disabled&&r.current.subject&&r.current.subject.subscribe({next:r.current.next});return()=>{t&&t.unsubscribe()}}),[e.disabled])}function U(e){const r=w(),{control:s=r.control,disabled:a,name:n,exact:i}=e||{},[u,o]=t.default.useState(s._formState),l=t.default.useRef(!0),d=t.default.useRef({isDirty:!1,isLoading:!1,dirtyFields:!1,touchedFields:!1,validatingFields:!1,isValidating:!1,isValid:!1,errors:!1}),c=t.default.useRef(n);return c.current=n,j({disabled:a,next:e=>l.current&&O(c.current,e.name,i)&&C(e,d.current,s._updateFormState)&&o({...s._formState,...e}),subject:s._subjects.state}),t.default.useEffect((()=>(l.current=!0,d.current.isValid&&s._updateValid(!0),()=>{l.current=!1})),[s]),D(u,s,d.current,!1)}var T=e=>"string"==typeof e,B=(e,t,r,s,a)=>T(e)?(s&&t.watch.add(e),y(r,e,a)):Array.isArray(e)?e.map((e=>(s&&t.watch.add(e),y(r,e)))):(s&&(t.watchAll=!0),r);function N(e){const r=w(),{control:s=r.control,name:a,defaultValue:n,disabled:i,exact:u}=e||{},o=t.default.useRef(a);o.current=a,j({disabled:i,subject:s._subjects.values,next:e=>{O(o.current,e.name,u)&&d(c(B(o.current,s._names,e.values||s._formValues,!1,n)))}});const[l,d]=t.default.useState(s._getWatch(a,n));return t.default.useEffect((()=>s._removeUnmounted())),l}var L=e=>/^\w*$/.test(e),M=e=>f(e.replace(/["|']|\]/g,"").split(/\.|\[/)),R=(e,t,r)=>{let s=-1;const a=L(t)?[t]:M(t),n=a.length,u=n-1;for(;++s<n;){const t=a[s];let n=r;if(s!==u){const r=e[t];n=i(r)||Array.isArray(r)?r:isNaN(+a[s+1])?{}:[]}e[t]=n,e=e[t]}return e};function P(e){const r=w(),{name:s,disabled:a,control:n=r.control,shouldUnregister:i}=e,l=o(n._names.array,s),d=N({control:n,name:s,defaultValue:y(n._formValues,s,y(n._defaultValues,s,e.defaultValue)),exact:!0}),f=U({control:n,name:s}),_=t.default.useRef(n.register(s,{...e.rules,value:d,...p(e.disabled)?{disabled:e.disabled}:{}}));return t.default.useEffect((()=>{const e=n._options.shouldUnregister||i,t=(e,t)=>{const r=y(n._fields,e);r&&(r._f.mount=t)};if(t(s,!0),e){const e=c(y(n._options.defaultValues,s));R(n._defaultValues,s,e),m(y(n._formValues,s))&&R(n._formValues,s,e)}return()=>{(l?e&&!n._state.action:e)?n.unregister(s):t(s,!1)}}),[s,n,l,i]),t.default.useEffect((()=>{y(n._fields,s)&&n._updateDisabledField({disabled:a,fields:n._fields,name:s,value:y(n._fields,s)._f.value})}),[a,s,n]),{field:{name:s,value:d,...p(a)||f.disabled?{disabled:f.disabled||a}:{},onChange:t.default.useCallback((e=>_.current.onChange({target:{value:u(e),name:s},type:g.CHANGE})),[s]),onBlur:t.default.useCallback((()=>_.current.onBlur({target:{value:y(n._formValues,s),name:s},type:g.BLUR})),[s,n]),ref:e=>{const t=y(n._fields,s);t&&e&&(t._f.ref={focus:()=>e.focus(),select:()=>e.select(),setCustomValidity:t=>e.setCustomValidity(t),reportValidity:()=>e.reportValidity()})}},formState:f,fieldState:Object.defineProperties({},{invalid:{enumerable:!0,get:()=>!!y(f.errors,s)},isDirty:{enumerable:!0,get:()=>!!y(f.dirtyFields,s)},isTouched:{enumerable:!0,get:()=>!!y(f.touchedFields,s)},isValidating:{enumerable:!0,get:()=>!!y(f.validatingFields,s)},error:{enumerable:!0,get:()=>y(f.errors,s)}})}}const q="post";var W=(e,t,r,s,a)=>t?{...r[e],types:{...r[e]&&r[e].types?r[e].types:{},[s]:a||!0}}:{},I=()=>{const e="undefined"==typeof performance?Date.now():1e3*performance.now();return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,(t=>{const r=(16*Math.random()+e)%16|0;return("x"==t?r:3&r|8).toString(16)}))},$=(e,t,r={})=>r.shouldFocus||m(r.shouldFocus)?r.focusName||`${e}.${m(r.focusIndex)?t:r.focusIndex}.`:"",H=e=>({isOnSubmit:!e||e===_.onSubmit,isOnBlur:e===_.onBlur,isOnChange:e===_.onChange,isOnAll:e===_.all,isOnTouch:e===_.onTouched}),G=(e,t,r)=>!r&&(t.watchAll||t.watch.has(e)||[...t.watch].some((t=>e.startsWith(t)&&/^\.\w+/.test(e.slice(t.length)))));const J=(e,t,r,s)=>{for(const a of r||Object.keys(e)){const r=y(e,a);if(r){const{_f:e,...n}=r;if(e){if(e.refs&&e.refs[0]&&t(e.refs[0],a)&&!s)break;if(e.ref&&t(e.ref,e.name)&&!s)break;J(n,t)}else i(n)&&J(n,t)}}};var z=(e,t,r)=>{const s=f(y(e,r));return R(s,"root",t[r]),R(e,r,s),e},K=e=>"file"===e.type,Q=e=>"function"==typeof e,X=e=>{if(!d)return!1;const t=e?e.ownerDocument:0;return e instanceof(t&&t.defaultView?t.defaultView.HTMLElement:HTMLElement)},Y=e=>T(e),Z=e=>"radio"===e.type,ee=e=>e instanceof RegExp;const te={value:!1,isValid:!1},re={value:!0,isValid:!0};var se=e=>{if(Array.isArray(e)){if(e.length>1){const t=e.filter((e=>e&&e.checked&&!e.disabled)).map((e=>e.value));return{value:t,isValid:!!t.length}}return e[0].checked&&!e[0].disabled?e[0].attributes&&!m(e[0].attributes.value)?m(e[0].value)||""===e[0].value?re:{value:e[0].value,isValid:!0}:re:te}return te};const ae={isValid:!1,value:null};var ne=e=>Array.isArray(e)?e.reduce(((e,t)=>t&&t.checked&&!t.disabled?{isValid:!0,value:t.value}:e),ae):ae;function ie(e,t,r="validate"){if(Y(e)||Array.isArray(e)&&e.every(Y)||p(e)&&!e)return{type:r,message:Y(e)?e:"",ref:t}}var ue=e=>i(e)&&!ee(e)?e:{value:e,message:""},oe=async(e,t,s,n,u)=>{const{ref:o,refs:l,required:d,maxLength:c,minLength:f,min:g,max:_,pattern:S,validate:w,name:D,valueAsNumber:C,mount:E,disabled:O}=e._f,j=y(t,D);if(!E||O)return{};const U=l?l[0]:o,B=e=>{n&&U.reportValidity&&(U.setCustomValidity(p(e)?"":e||""),U.reportValidity())},N={},L=Z(o),M=r(o),R=L||M,P=(C||K(o))&&m(o.value)&&m(j)||X(o)&&""===o.value||""===j||Array.isArray(j)&&!j.length,q=W.bind(null,D,s,N),I=(e,t,r,s=b,a=x)=>{const n=e?t:r;N[D]={type:e?s:a,message:n,ref:o,...q(e?s:a,n)}};if(u?!Array.isArray(j)||!j.length:d&&(!R&&(P||a(j))||p(j)&&!j||M&&!se(l).isValid||L&&!ne(l).isValid)){const{value:e,message:t}=Y(d)?{value:!!d,message:d}:ue(d);if(e&&(N[D]={type:A,message:t,ref:U,...q(A,t)},!s))return B(t),N}if(!(P||a(g)&&a(_))){let e,t;const r=ue(_),n=ue(g);if(a(j)||isNaN(j)){const s=o.valueAsDate||new Date(j),a=e=>new Date((new Date).toDateString()+" "+e),i="time"==o.type,u="week"==o.type;T(r.value)&&j&&(e=i?a(j)>a(r.value):u?j>r.value:s>new Date(r.value)),T(n.value)&&j&&(t=i?a(j)<a(n.value):u?j<n.value:s<new Date(n.value))}else{const s=o.valueAsNumber||(j?+j:j);a(r.value)||(e=s>r.value),a(n.value)||(t=s<n.value)}if((e||t)&&(I(!!e,r.message,n.message,v,h),!s))return B(N[D].message),N}if((c||f)&&!P&&(T(j)||u&&Array.isArray(j))){const e=ue(c),t=ue(f),r=!a(e.value)&&j.length>+e.value,n=!a(t.value)&&j.length<+t.value;if((r||n)&&(I(r,e.message,t.message),!s))return B(N[D].message),N}if(S&&!P&&T(j)){const{value:e,message:t}=ue(S);if(ee(e)&&!j.match(e)&&(N[D]={type:V,message:t,ref:o,...q(V,t)},!s))return B(t),N}if(w)if(Q(w)){const e=ie(await w(j,t),U);if(e&&(N[D]={...e,...q(F,e.message)},!s))return B(e.message),N}else if(i(w)){let e={};for(const r in w){if(!k(e)&&!s)break;const a=ie(await w[r](j,t),U,r);a&&(e={...a,...q(r,a.message)},B(a.message),s&&(N[D]=e))}if(!k(e)&&(N[D]={ref:U,...e},!s))return N}return B(!0),N},le=(e,t)=>[...e,...E(t)],de=e=>Array.isArray(e)?e.map((()=>{})):void 0;function ce(e,t,r){return[...e.slice(0,t),...E(r),...e.slice(t)]}var fe=(e,t,r)=>Array.isArray(e)?(m(e[r])&&(e[r]=void 0),e.splice(r,0,e.splice(t,1)[0]),e):[],me=(e,t)=>[...E(t),...E(e)];var ye=(e,t)=>m(t)?[]:function(e,t){let r=0;const s=[...e];for(const e of t)s.splice(e-r,1),r++;return f(s).length?s:[]}(e,E(t).sort(((e,t)=>e-t))),pe=(e,t,r)=>{[e[t],e[r]]=[e[r],e[t]]};function ge(e,t){const r=Array.isArray(t)?t:L(t)?[t]:M(t),s=1===r.length?e:function(e,t){const r=t.slice(0,-1).length;let s=0;for(;s<r;)e=m(e)?s++:e[t[s++]];return e}(e,r),a=r.length-1,n=r[a];return s&&delete s[n],0!==a&&(i(s)&&k(s)||Array.isArray(s)&&function(e){for(const t in e)if(e.hasOwnProperty(t)&&!m(e[t]))return!1;return!0}(s))&&ge(e,r.slice(0,-1)),e}var _e=(e,t,r)=>(e[t]=r,e);var ve=()=>{let e=[];return{get observers(){return e},next:t=>{for(const r of e)r.next&&r.next(t)},subscribe:t=>(e.push(t),{unsubscribe:()=>{e=e.filter((e=>e!==t))}}),unsubscribe:()=>{e=[]}}},he=e=>a(e)||!n(e);function be(e,t){if(he(e)||he(t))return e===t;if(s(e)&&s(t))return e.getTime()===t.getTime();const r=Object.keys(e),a=Object.keys(t);if(r.length!==a.length)return!1;for(const n of r){const r=e[n];if(!a.includes(n))return!1;if("ref"!==n){const e=t[n];if(s(r)&&s(e)||i(r)&&i(e)||Array.isArray(r)&&Array.isArray(e)?!be(r,e):r!==e)return!1}}return!0}var xe=e=>"select-multiple"===e.type,Ve=e=>Z(e)||r(e),Ae=e=>X(e)&&e.isConnected,Fe=e=>{for(const t in e)if(Q(e[t]))return!0;return!1};function Se(e,t={}){const r=Array.isArray(e);if(i(e)||r)for(const r in e)Array.isArray(e[r])||i(e[r])&&!Fe(e[r])?(t[r]=Array.isArray(e[r])?[]:{},Se(e[r],t[r])):a(e[r])||(t[r]=!0);return t}function we(e,t,r){const s=Array.isArray(e);if(i(e)||s)for(const s in e)Array.isArray(e[s])||i(e[s])&&!Fe(e[s])?m(t)||he(r[s])?r[s]=Array.isArray(e[s])?Se(e[s],[]):{...Se(e[s])}:we(e[s],a(t)?{}:t[s],r[s]):r[s]=!be(e[s],t[s]);return r}var De=(e,t)=>we(e,t,Se(t)),ke=(e,{valueAsNumber:t,valueAsDate:r,setValueAs:s})=>m(e)?e:t?""===e?NaN:e?+e:e:r&&T(e)?new Date(e):s?s(e):e;function Ce(e){const t=e.ref;if(!(e.refs?e.refs.every((e=>e.disabled)):t.disabled))return K(t)?t.files:Z(t)?ne(e.refs).value:xe(t)?[...t.selectedOptions].map((({value:e})=>e)):r(t)?se(e.refs).value:ke(m(t.value)?e.ref.value:t.value,e)}var Ee=(e,t,r,s)=>{const a={};for(const r of e){const e=y(t,r);e&&R(a,r,e._f)}return{criteriaMode:r,names:[...e],fields:a,shouldUseNativeValidation:s}},Oe=e=>m(e)?e:ee(e)?e.source:i(e)?ee(e.value)?e.value.source:e.value:e,je=e=>e.mount&&(e.required||e.min||e.max||e.maxLength||e.minLength||e.pattern||e.validate);function Ue(e,t,r){const s=y(e,r);if(s||L(r))return{error:s,name:r};const a=r.split(".");for(;a.length;){const s=a.join("."),n=y(t,s),i=y(e,s);if(n&&!Array.isArray(n)&&r!==s)return{name:r};if(i&&i.type)return{name:s,error:i};a.pop()}return{name:r}}var Te=(e,t,r,s,a)=>!a.isOnAll&&(!r&&a.isOnTouch?!(t||e):(r?s.isOnBlur:a.isOnBlur)?!e:!(r?s.isOnChange:a.isOnChange)||e),Be=(e,t)=>!f(y(e,t)).length&&ge(e,t);const Ne={mode:_.onSubmit,reValidateMode:_.onChange,shouldFocusError:!0};function Le(e={}){let t,n={...Ne,...e},l={submitCount:0,isDirty:!1,isLoading:Q(n.defaultValues),isValidating:!1,isSubmitted:!1,isSubmitting:!1,isSubmitSuccessful:!1,isValid:!1,touchedFields:{},dirtyFields:{},validatingFields:{},errors:n.errors||{},disabled:n.disabled||!1},v={},h=(i(n.defaultValues)||i(n.values))&&c(n.defaultValues||n.values)||{},b=n.shouldUnregister?{}:c(h),x={action:!1,mount:!1,watch:!1},V={mount:new Set,unMount:new Set,array:new Set,watch:new Set},A=0;const F={isDirty:!1,dirtyFields:!1,validatingFields:!1,touchedFields:!1,isValidating:!1,isValid:!1,errors:!1},S={values:ve(),array:ve(),state:ve()},w=H(n.mode),D=H(n.reValidateMode),C=n.criteriaMode===_.all,O=async e=>{if(F.isValid||e){const e=n.resolver?k((await M()).errors):await P(v,!0);e!==l.isValid&&S.state.next({isValid:e})}},j=(e,t)=>{(F.isValidating||F.validatingFields)&&((e||Array.from(V.mount)).forEach((e=>{e&&(t?R(l.validatingFields,e,t):ge(l.validatingFields,e))})),S.state.next({validatingFields:l.validatingFields,isValidating:!k(l.validatingFields)}))},U=(e,t,r,s)=>{const a=y(v,e);if(a){const n=y(b,e,m(r)?y(h,e):r);m(n)||s&&s.defaultChecked||t?R(b,e,t?n:Ce(a._f)):I(e,n),x.mount&&O()}},N=(e,t,r,s,a)=>{let n=!1,i=!1;const u={name:e},o=!(!y(v,e)||!y(v,e)._f.disabled);if(!r||s){F.isDirty&&(i=l.isDirty,l.isDirty=u.isDirty=q(),n=i!==u.isDirty);const r=o||be(y(h,e),t);i=!(o||!y(l.dirtyFields,e)),r||o?ge(l.dirtyFields,e):R(l.dirtyFields,e,!0),u.dirtyFields=l.dirtyFields,n=n||F.dirtyFields&&i!==!r}if(r){const t=y(l.touchedFields,e);t||(R(l.touchedFields,e,r),u.touchedFields=l.touchedFields,n=n||F.touchedFields&&t!==r)}return n&&a&&S.state.next(u),n?u:{}},L=(r,s,a,n)=>{const i=y(l.errors,r),u=F.isValid&&p(s)&&l.isValid!==s;var o;if(e.delayError&&a?(o=()=>((e,t)=>{R(l.errors,e,t),S.state.next({errors:l.errors})})(r,a),t=e=>{clearTimeout(A),A=setTimeout(o,e)},t(e.delayError)):(clearTimeout(A),t=null,a?R(l.errors,r,a):ge(l.errors,r)),(a?!be(i,a):i)||!k(n)||u){const e={...n,...u&&p(s)?{isValid:s}:{},errors:l.errors,name:r};l={...l,...e},S.state.next(e)}},M=async e=>{j(e,!0);const t=await n.resolver(b,n.context,Ee(e||V.mount,v,n.criteriaMode,n.shouldUseNativeValidation));return j(e),t},P=async(e,t,r={valid:!0})=>{for(const s in e){const a=e[s];if(a){const{_f:e,...i}=a;if(e){const i=V.array.has(e.name);j([s],!0);const u=await oe(a,b,C,n.shouldUseNativeValidation&&!t,i);if(j([s]),u[e.name]&&(r.valid=!1,t))break;!t&&(y(u,e.name)?i?z(l.errors,u,e.name):R(l.errors,e.name,u[e.name]):ge(l.errors,e.name))}i&&await P(i,t,r)}}return r.valid},q=(e,t)=>(e&&t&&R(b,e,t),!be(re(),h)),W=(e,t,r)=>B(e,V,{...x.mount?b:m(t)?h:T(e)?{[e]:t}:t},r,t),I=(e,t,s={})=>{const n=y(v,e);let i=t;if(n){const s=n._f;s&&(!s.disabled&&R(b,e,ke(t,s)),i=X(s.ref)&&a(t)?"":t,xe(s.ref)?[...s.ref.options].forEach((e=>e.selected=i.includes(e.value))):s.refs?r(s.ref)?s.refs.length>1?s.refs.forEach((e=>(!e.defaultChecked||!e.disabled)&&(e.checked=Array.isArray(i)?!!i.find((t=>t===e.value)):i===e.value))):s.refs[0]&&(s.refs[0].checked=!!i):s.refs.forEach((e=>e.checked=e.value===i)):K(s.ref)?s.ref.value="":(s.ref.value=i,s.ref.type||S.values.next({name:e,values:{...b}})))}(s.shouldDirty||s.shouldTouch)&&N(e,i,s.shouldTouch,s.shouldDirty,!0),s.shouldValidate&&te(e)},$=(e,t,r)=>{for(const a in t){const n=t[a],i=`${e}.${a}`,u=y(v,i);!V.array.has(e)&&he(n)&&(!u||u._f)||s(n)?I(i,n,r):$(i,n,r)}},Y=(e,t,r={})=>{const s=y(v,e),n=V.array.has(e),i=c(t);R(b,e,i),n?(S.array.next({name:e,values:{...b}}),(F.isDirty||F.dirtyFields)&&r.shouldDirty&&S.state.next({name:e,dirtyFields:De(h,b),isDirty:q(e,i)})):!s||s._f||a(i)?I(e,i,r):$(e,i,r),G(e,V)&&S.state.next({...l}),S.values.next({name:x.mount?e:void 0,values:{...b}})},Z=async e=>{x.mount=!0;const r=e.target;let s=r.name,a=!0;const i=y(v,s),o=e=>{a=Number.isNaN(e)||e===y(b,s,e)};if(i){let d,c;const f=r.type?Ce(i._f):u(e),m=e.type===g.BLUR||e.type===g.FOCUS_OUT,p=!je(i._f)&&!n.resolver&&!y(l.errors,s)&&!i._f.deps||Te(m,y(l.touchedFields,s),l.isSubmitted,D,w),_=G(s,V,m);R(b,s,f),m?(i._f.onBlur&&i._f.onBlur(e),t&&t(0)):i._f.onChange&&i._f.onChange(e);const h=N(s,f,m,!1),x=!k(h)||_;if(!m&&S.values.next({name:s,type:e.type,values:{...b}}),p)return F.isValid&&O(),x&&S.state.next({name:s,..._?{}:h});if(!m&&_&&S.state.next({...l}),n.resolver){const{errors:e}=await M([s]);if(o(f),a){const t=Ue(l.errors,v,s),r=Ue(e,v,t.name||s);d=r.error,s=r.name,c=k(e)}}else j([s],!0),d=(await oe(i,b,C,n.shouldUseNativeValidation))[s],j([s]),o(f),a&&(d?c=!1:F.isValid&&(c=await P(v,!0)));a&&(i._f.deps&&te(i._f.deps),L(s,c,d,h))}},ee=(e,t)=>{if(y(l.errors,t)&&e.focus)return e.focus(),1},te=async(e,t={})=>{let r,s;const a=E(e);if(n.resolver){const t=await(async e=>{const{errors:t}=await M(e);if(e)for(const r of e){const e=y(t,r);e?R(l.errors,r,e):ge(l.errors,r)}else l.errors=t;return t})(m(e)?e:a);r=k(t),s=e?!a.some((e=>y(t,e))):r}else e?(s=(await Promise.all(a.map((async e=>{const t=y(v,e);return await P(t&&t._f?{[e]:t}:t)})))).every(Boolean),(s||l.isValid)&&O()):s=r=await P(v);return S.state.next({...!T(e)||F.isValid&&r!==l.isValid?{}:{name:e},...n.resolver||!e?{isValid:r}:{},errors:l.errors}),t.shouldFocus&&!s&&J(v,ee,e?a:V.mount),s},re=e=>{const t={...h,...x.mount?b:{}};return m(e)?t:T(e)?y(t,e):e.map((e=>y(t,e)))},se=(e,t)=>({invalid:!!y((t||l).errors,e),isDirty:!!y((t||l).dirtyFields,e),isTouched:!!y((t||l).touchedFields,e),isValidating:!!y((t||l).validatingFields,e),error:y((t||l).errors,e)}),ae=(e,t,r)=>{const s=(y(v,e,{_f:{}})._f||{}).ref;R(l.errors,e,{...t,ref:s}),S.state.next({name:e,errors:l.errors,isValid:!1}),r&&r.shouldFocus&&s&&s.focus&&s.focus()},ne=(e,t={})=>{for(const r of e?E(e):V.mount)V.mount.delete(r),V.array.delete(r),t.keepValue||(ge(v,r),ge(b,r)),!t.keepError&&ge(l.errors,r),!t.keepDirty&&ge(l.dirtyFields,r),!t.keepTouched&&ge(l.touchedFields,r),!t.keepIsValidating&&ge(l.validatingFields,r),!n.shouldUnregister&&!t.keepDefaultValue&&ge(h,r);S.values.next({values:{...b}}),S.state.next({...l,...t.keepDirty?{isDirty:q()}:{}}),!t.keepIsValid&&O()},ie=({disabled:e,name:t,field:r,fields:s,value:a})=>{if(p(e)){const n=e?void 0:m(a)?Ce(r?r._f:y(s,t)._f):a;R(b,t,n),N(t,n,!1,!1,!0)}},ue=(e,t={})=>{let r=y(v,e);const s=p(t.disabled);return R(v,e,{...r||{},_f:{...r&&r._f?r._f:{ref:{name:e}},name:e,mount:!0,...t}}),V.mount.add(e),r?ie({field:r,disabled:t.disabled,name:e,value:t.value}):U(e,!0,t.value),{...s?{disabled:t.disabled}:{},...n.progressive?{required:!!t.required,min:Oe(t.min),max:Oe(t.max),minLength:Oe(t.minLength),maxLength:Oe(t.maxLength),pattern:Oe(t.pattern)}:{},name:e,onChange:Z,onBlur:Z,ref:s=>{if(s){ue(e,t),r=y(v,e);const a=m(s.value)&&s.querySelectorAll&&s.querySelectorAll("input,select,textarea")[0]||s,n=Ve(a),i=r._f.refs||[];if(n?i.find((e=>e===a)):a===r._f.ref)return;R(v,e,{_f:{...r._f,...n?{refs:[...i.filter(Ae),a,...Array.isArray(y(h,e))?[{}]:[]],ref:{type:a.type,name:e}}:{ref:a}}}),U(e,!1,void 0,a)}else r=y(v,e,{}),r._f&&(r._f.mount=!1),(n.shouldUnregister||t.shouldUnregister)&&(!o(V.array,e)||!x.action)&&V.unMount.add(e)}}},le=()=>n.shouldFocusError&&J(v,ee,V.mount),de=(e,t)=>async r=>{let s;r&&(r.preventDefault&&r.preventDefault(),r.persist&&r.persist());let a=c(b);if(S.state.next({isSubmitting:!0}),n.resolver){const{errors:e,values:t}=await M();l.errors=e,a=t}else await P(v);if(ge(l.errors,"root"),k(l.errors)){S.state.next({errors:{}});try{await e(a,r)}catch(e){s=e}}else t&&await t({...l.errors},r),le(),setTimeout(le);if(S.state.next({isSubmitted:!0,isSubmitting:!1,isSubmitSuccessful:k(l.errors)&&!s,submitCount:l.submitCount+1,errors:l.errors}),s)throw s},ce=(t,r={})=>{const s=t?c(t):h,a=c(s),n=k(t),i=n?h:a;if(r.keepDefaultValues||(h=s),!r.keepValues){if(r.keepDirtyValues)for(const e of V.mount)y(l.dirtyFields,e)?R(i,e,y(b,e)):Y(e,y(i,e));else{if(d&&m(t))for(const e of V.mount){const t=y(v,e);if(t&&t._f){const e=Array.isArray(t._f.refs)?t._f.refs[0]:t._f.ref;if(X(e)){const t=e.closest("form");if(t){t.reset();break}}}}v={}}b=e.shouldUnregister?r.keepDefaultValues?c(h):{}:c(i),S.array.next({values:{...i}}),S.values.next({values:{...i}})}V={mount:r.keepDirtyValues?V.mount:new Set,unMount:new Set,array:new Set,watch:new Set,watchAll:!1,focus:""},x.mount=!F.isValid||!!r.keepIsValid||!!r.keepDirtyValues,x.watch=!!e.shouldUnregister,S.state.next({submitCount:r.keepSubmitCount?l.submitCount:0,isDirty:!n&&(r.keepDirty?l.isDirty:!(!r.keepDefaultValues||be(t,h))),isSubmitted:!!r.keepIsSubmitted&&l.isSubmitted,dirtyFields:n?[]:r.keepDirtyValues?r.keepDefaultValues&&b?De(h,b):l.dirtyFields:r.keepDefaultValues&&t?De(h,t):{},touchedFields:r.keepTouched?l.touchedFields:{},errors:r.keepErrors?l.errors:{},isSubmitSuccessful:!!r.keepIsSubmitSuccessful&&l.isSubmitSuccessful,isSubmitting:!1})},fe=(e,t)=>ce(Q(e)?e(b):e,t);return{control:{register:ue,unregister:ne,getFieldState:se,handleSubmit:de,setError:ae,_executeSchema:M,_getWatch:W,_getDirty:q,_updateValid:O,_removeUnmounted:()=>{for(const e of V.unMount){const t=y(v,e);t&&(t._f.refs?t._f.refs.every((e=>!Ae(e))):!Ae(t._f.ref))&&ne(e)}V.unMount=new Set},_updateFieldArray:(e,t=[],r,s,a=!0,n=!0)=>{if(s&&r){if(x.action=!0,n&&Array.isArray(y(v,e))){const t=r(y(v,e),s.argA,s.argB);a&&R(v,e,t)}if(n&&Array.isArray(y(l.errors,e))){const t=r(y(l.errors,e),s.argA,s.argB);a&&R(l.errors,e,t),Be(l.errors,e)}if(F.touchedFields&&n&&Array.isArray(y(l.touchedFields,e))){const t=r(y(l.touchedFields,e),s.argA,s.argB);a&&R(l.touchedFields,e,t)}F.dirtyFields&&(l.dirtyFields=De(h,b)),S.state.next({name:e,isDirty:q(e,t),dirtyFields:l.dirtyFields,errors:l.errors,isValid:l.isValid})}else R(b,e,t)},_updateDisabledField:ie,_getFieldArray:t=>f(y(x.mount?b:h,t,e.shouldUnregister?y(h,t,[]):[])),_reset:ce,_resetDefaultValues:()=>Q(n.defaultValues)&&n.defaultValues().then((e=>{fe(e,n.resetOptions),S.state.next({isLoading:!1})})),_updateFormState:e=>{l={...l,...e}},_disableForm:e=>{p(e)&&(S.state.next({disabled:e}),J(v,((t,r)=>{let s=e;const a=y(v,r);a&&p(a._f.disabled)&&(s||(s=a._f.disabled)),t.disabled=s}),0,!1))},_subjects:S,_proxyFormState:F,_setErrors:e=>{l.errors=e,S.state.next({errors:l.errors,isValid:!1})},get _fields(){return v},get _formValues(){return b},get _state(){return x},set _state(e){x=e},get _defaultValues(){return h},get _names(){return V},set _names(e){V=e},get _formState(){return l},set _formState(e){l=e},get _options(){return n},set _options(e){n={...n,...e}}},trigger:te,register:ue,handleSubmit:de,watch:(e,t)=>Q(e)?S.values.subscribe({next:r=>e(W(void 0,t),r)}):W(e,t,!0),setValue:Y,getValues:re,reset:fe,resetField:(e,t={})=>{y(v,e)&&(m(t.defaultValue)?Y(e,c(y(h,e))):(Y(e,t.defaultValue),R(h,e,c(t.defaultValue))),t.keepTouched||ge(l.touchedFields,e),t.keepDirty||(ge(l.dirtyFields,e),l.isDirty=t.defaultValue?q(e,c(y(h,e))):q()),t.keepError||(ge(l.errors,e),F.isValid&&O()),S.state.next({...l}))},clearErrors:e=>{e&&E(e).forEach((e=>ge(l.errors,e))),S.state.next({errors:e?l.errors:{}})},unregister:ne,setError:ae,setFocus:(e,t={})=>{const r=y(v,e),s=r&&r._f;if(s){const e=s.refs?s.refs[0]:s.ref;e.focus&&(e.focus(),t.shouldSelect&&e.select())}},getFieldState:se}}exports.Controller=e=>e.render(P(e)),exports.Form=function(e){const r=w(),[s,a]=t.default.useState(!1),{control:n=r.control,onSubmit:i,children:u,action:o,method:l=q,headers:d,encType:c,onError:f,render:m,onSuccess:p,validateStatus:g,..._}=e,v=async t=>{let r=!1,s="";await n.handleSubmit((async e=>{const a=new FormData;let u="";try{u=JSON.stringify(e)}catch(e){}for(const t of n._names.mount)a.append(t,y(e,t));if(i&&await i({data:e,event:t,method:l,formData:a,formDataJson:u}),o)try{const e=[d&&d["Content-Type"],c].some((e=>e&&e.includes("json"))),t=await fetch(o,{method:l,headers:{...d,...c?{"Content-Type":c}:{}},body:e?u:a});t&&(g?!g(t.status):t.status<200||t.status>=300)?(r=!0,f&&f({response:t}),s=String(t.status)):p&&p({response:t})}catch(e){r=!0,f&&f({error:e})}}))(t),r&&e.control&&(e.control._subjects.state.next({isSubmitSuccessful:!1}),e.control.setError("root.server",{type:s}))};return t.default.useEffect((()=>{a(!0)}),[]),m?t.default.createElement(t.default.Fragment,null,m({submit:v})):t.default.createElement("form",{noValidate:s,action:o,method:l,encType:c,onSubmit:v,..._},u)},exports.FormProvider=e=>{const{children:r,...s}=e;return t.default.createElement(S.Provider,{value:s},r)},exports.appendErrors=W,exports.get=y,exports.set=R,exports.useController=P,exports.useFieldArray=function(e){const r=w(),{control:s=r.control,name:a,keyName:n="id",shouldUnregister:i}=e,[u,o]=t.default.useState(s._getFieldArray(a)),l=t.default.useRef(s._getFieldArray(a).map(I)),d=t.default.useRef(u),f=t.default.useRef(a),m=t.default.useRef(!1);f.current=a,d.current=u,s._names.array.add(a),e.rules&&s.register(a,e.rules),j({next:({values:e,name:t})=>{if(t===f.current||!t){const t=y(e,f.current);Array.isArray(t)&&(o(t),l.current=t.map(I))}},subject:s._subjects.array});const p=t.default.useCallback((e=>{m.current=!0,s._updateFieldArray(a,e)}),[s,a]);return t.default.useEffect((()=>{if(s._state.action=!1,G(a,s._names)&&s._subjects.state.next({...s._formState}),m.current&&(!H(s._options.mode).isOnSubmit||s._formState.isSubmitted))if(s._options.resolver)s._executeSchema([a]).then((e=>{const t=y(e.errors,a),r=y(s._formState.errors,a);(r?!t&&r.type||t&&(r.type!==t.type||r.message!==t.message):t&&t.type)&&(t?R(s._formState.errors,a,t):ge(s._formState.errors,a),s._subjects.state.next({errors:s._formState.errors}))}));else{const e=y(s._fields,a);!e||!e._f||H(s._options.reValidateMode).isOnSubmit&&H(s._options.mode).isOnSubmit||oe(e,s._formValues,s._options.criteriaMode===_.all,s._options.shouldUseNativeValidation,!0).then((e=>!k(e)&&s._subjects.state.next({errors:z(s._formState.errors,e,a)})))}s._subjects.values.next({name:a,values:{...s._formValues}}),s._names.focus&&J(s._fields,((e,t)=>{if(s._names.focus&&t.startsWith(s._names.focus)&&e.focus)return e.focus(),1})),s._names.focus="",s._updateValid(),m.current=!1}),[u,a,s]),t.default.useEffect((()=>(!y(s._formValues,a)&&s._updateFieldArray(a),()=>{(s._options.shouldUnregister||i)&&s.unregister(a)})),[a,s,n,i]),{swap:t.default.useCallback(((e,t)=>{const r=s._getFieldArray(a);pe(r,e,t),pe(l.current,e,t),p(r),o(r),s._updateFieldArray(a,r,pe,{argA:e,argB:t},!1)}),[p,a,s]),move:t.default.useCallback(((e,t)=>{const r=s._getFieldArray(a);fe(r,e,t),fe(l.current,e,t),p(r),o(r),s._updateFieldArray(a,r,fe,{argA:e,argB:t},!1)}),[p,a,s]),prepend:t.default.useCallback(((e,t)=>{const r=E(c(e)),n=me(s._getFieldArray(a),r);s._names.focus=$(a,0,t),l.current=me(l.current,r.map(I)),p(n),o(n),s._updateFieldArray(a,n,me,{argA:de(e)})}),[p,a,s]),append:t.default.useCallback(((e,t)=>{const r=E(c(e)),n=le(s._getFieldArray(a),r);s._names.focus=$(a,n.length-1,t),l.current=le(l.current,r.map(I)),p(n),o(n),s._updateFieldArray(a,n,le,{argA:de(e)})}),[p,a,s]),remove:t.default.useCallback((e=>{const t=ye(s._getFieldArray(a),e);l.current=ye(l.current,e),p(t),o(t),s._updateFieldArray(a,t,ye,{argA:e})}),[p,a,s]),insert:t.default.useCallback(((e,t,r)=>{const n=E(c(t)),i=ce(s._getFieldArray(a),e,n);s._names.focus=$(a,e,r),l.current=ce(l.current,e,n.map(I)),p(i),o(i),s._updateFieldArray(a,i,ce,{argA:e,argB:de(t)})}),[p,a,s]),update:t.default.useCallback(((e,t)=>{const r=c(t),n=_e(s._getFieldArray(a),e,r);l.current=[...n].map(((t,r)=>t&&r!==e?l.current[r]:I())),p(n),o([...n]),s._updateFieldArray(a,n,_e,{argA:e,argB:r},!0,!1)}),[p,a,s]),replace:t.default.useCallback((e=>{const t=E(c(e));l.current=t.map(I),p([...t]),o([...t]),s._updateFieldArray(a,[...t],(e=>e),{},!0,!1)}),[p,a,s]),fields:t.default.useMemo((()=>u.map(((e,t)=>({...e,[n]:l.current[t]||I()})))),[u,n])}},exports.useForm=function(e={}){const r=t.default.useRef(),s=t.default.useRef(),[a,n]=t.default.useState({isDirty:!1,isValidating:!1,isLoading:Q(e.defaultValues),isSubmitted:!1,isSubmitting:!1,isSubmitSuccessful:!1,isValid:!1,submitCount:0,dirtyFields:{},touchedFields:{},validatingFields:{},errors:e.errors||{},disabled:e.disabled||!1,defaultValues:Q(e.defaultValues)?void 0:e.defaultValues});r.current||(r.current={...Le(e),formState:a});const i=r.current.control;return i._options=e,j({subject:i._subjects.state,next:e=>{C(e,i._proxyFormState,i._updateFormState,!0)&&n({...i._formState})}}),t.default.useEffect((()=>i._disableForm(e.disabled)),[i,e.disabled]),t.default.useEffect((()=>{if(i._proxyFormState.isDirty){const e=i._getDirty();e!==a.isDirty&&i._subjects.state.next({isDirty:e})}}),[i,a.isDirty]),t.default.useEffect((()=>{e.values&&!be(e.values,s.current)?(i._reset(e.values,i._options.resetOptions),s.current=e.values,n((e=>({...e})))):i._resetDefaultValues()}),[e.values,i]),t.default.useEffect((()=>{e.errors&&i._setErrors(e.errors)}),[e.errors,i]),t.default.useEffect((()=>{i._state.mount||(i._updateValid(),i._state.mount=!0),i._state.watch&&(i._state.watch=!1,i._subjects.state.next({...i._formState})),i._removeUnmounted()})),t.default.useEffect((()=>{e.shouldUnregister&&i._subjects.values.next({values:i._getWatch()})}),[e.shouldUnregister,i]),r.current.formState=D(a,i),r.current},exports.useFormContext=w,exports.useFormState=U,exports.useWatch=N;
//# sourceMappingURL=index.cjs.js.map


/***/ }),

/***/ "./src/category/panel.tsx":
/*!********************************!*\
  !*** ./src/category/panel.tsx ***!
  \********************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {


var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
Object.defineProperty(exports, "__esModule", ({ value: true }));
var react_1 = __webpack_require__(/*! react */ "react");
var element_1 = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
var react_hook_form_1 = __webpack_require__(/*! react-hook-form */ "./node_modules/react-hook-form/dist/index.cjs.js");
var Tab = function (props) {
    var _a = (0, react_hook_form_1.useForm)({
        defaultValues: __assign(__assign({}, (props.data || {})), { pplNonce: props.pplNonce })
    }), register = _a.register, control = _a.control;
    var float = {
        float: "none",
        width: "auto"
    };
    var methods = (0, element_1.useMemo)(function () {
        var methods = props.methods.map(function (x) { return x; });
        methods.sort(function (x, y) {
            return x.title.localeCompare(y.title);
        });
        return methods;
    }, [props.methods]);
    return (0, react_1.createElement)("p", {
        className: "form-field"
    }, methods.map(function (shipment) {
        return (0, react_1.createElement)(react_hook_form_1.Controller, {
            control: control,
            name: "pplDisabledTransport",
            render: function (props) {
                var value = props.field.value || [];
                var checked = value.indexOf(shipment.code) > -1;
                return (0, react_1.createElement)("div", null, (0, react_1.createElement)("label", {
                    style: float,
                    htmlFor: "pplDisabledTransport_".concat(shipment.code)
                }, (0, react_1.createElement)("input", __assign({ type: "hidden" }, register("pplNonce"))), (0, react_1.createElement)("input", {
                    value: "".concat(shipment.code),
                    style: float,
                    id: "pplDisabledTransport_".concat(shipment.code),
                    type: "checkbox",
                    name: "pplDisabledTransport[]",
                    checked: checked,
                    onChange: function (x) {
                        if (value.indexOf(shipment.code) > -1)
                            props.field.onChange(value.filter(function (x) { return x !== shipment.code; }));
                        else
                            props.field.onChange(value.concat([shipment.code]));
                    }
                }), "\xA0 ", shipment.title));
            }
        });
    }));
};
function category_tab(element, props) {
    var el = element;
    (0, element_1.render)((0, react_1.createElement)(Tab, __assign({}, props)), el);
}
exports["default"] = category_tab;


/***/ }),

/***/ "./src/order/changePackages.tsx":
/*!**************************************!*\
  !*** ./src/order/changePackages.tsx ***!
  \**************************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
exports.cancelPackage = exports.removePackage = exports.addPackage = exports.removeShipment = void 0;
var createId = function (orderId) { return "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay"); };
var removeShipment = function (nonce, orderId, shipmentId) {
    jQuery(createId(orderId)).find('button').attr("disabled", "disabled");
    // @ts-ignore
    wp.ajax.post({
        action: "pplcz_order_panel_remove_shipment",
        orderId: orderId,
        shipmentId: shipmentId,
        nonce: nonce
    }).done(function (response) {
        jQuery(createId(orderId)).html(response.html);
        jQuery(window).trigger("pplcz-refresh-".concat(orderId));
    }).fail(function (response) {
        jQuery(createId(orderId)).find('button').removeAttr("disabled");
    });
};
exports.removeShipment = removeShipment;
var addPackage = function (nonce, orderId, shipmentId) {
    jQuery(createId(orderId)).find('button').attr("disabled", "disabled");
    // @ts-ignore
    wp.ajax.post({
        action: "pplcz_order_panel_add_package",
        orderId: orderId,
        shipmentId: shipmentId,
        nonce: nonce
    }).done(function (response) {
        jQuery(createId(orderId)).html(response.html);
        jQuery(window).trigger("pplcz-refresh-".concat(orderId));
    }).fail(function (response) {
        jQuery(createId(orderId)).find('button').removeAttr("disabled");
    });
};
exports.addPackage = addPackage;
var removePackage = function (nonce, orderId, shipmentId) {
    jQuery(createId(orderId)).find('button').attr("disabled", "disabled");
    // @ts-ignore
    wp.ajax.post({
        action: "pplcz_order_panel_remove_package",
        orderId: orderId,
        shipmentId: shipmentId,
        nonce: nonce
    }).done(function (response) {
        jQuery(createId(orderId)).html(response.html);
        jQuery(window).trigger("pplcz-refresh-".concat(orderId));
    }).fail(function (response) {
        jQuery(createId(orderId)).find('button').removeAttr("disabled");
    });
};
exports.removePackage = removePackage;
var cancelPackage = function (nonce, orderId, shipmentId, packageId) {
    jQuery("#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay")).find('button').attr("disabled", "disabled");
    // @ts-ignore
    wp.ajax.post({
        action: "pplcz_order_panel_cancel_package",
        orderId: orderId,
        shipmentId: shipmentId,
        packageId: packageId,
        nonce: nonce
    }).done(function (response) {
        jQuery(createId(orderId)).html(response.html);
        jQuery(window).trigger("pplcz-refresh-".concat(orderId));
    }).fail(function (response) {
        jQuery(createId(orderId)).find('button').removeAttr("disabled");
        if (typeof response === "string") {
            // @ts-ignore
            wp.data.dispatch('core/notices').createNotice('error', 
            // Can be one of: success, info, warning, error.
            response, 
            // Text string to display.
            {
                isDismissible: true // Whether the user can dismiss the notice.
                // Any actions the user can perform.
            });
        }
    });
};
exports.cancelPackage = cancelPackage;


/***/ }),

/***/ "./src/order/form.tsx":
/*!****************************!*\
  !*** ./src/order/form.tsx ***!
  \****************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
exports.form = void 0;
var renderForm = function (nonce, orderId, shipment) {
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    // @ts-ignore
    var PPLczPlugin = window.PPLczPlugin = window.PPLczPlugin || [];
    PPLczPlugin.push(["wpUpdateStyle", "pplcz-order-panel-shipment-div-".concat(orderId, "-overlay")]);
    var unmount = null;
    var item = jQuery("<div>").prependTo("body")[0];
    PPLczPlugin.push(["newShipment", item, {
            "shipment": shipment,
            "returnFunc": function (data) {
                unmount = data.unmount;
            },
            "onChange": function () {
                // @ts-ignore
                wp.ajax.post({
                    action: "pplcz_order_panel",
                    orderId: orderId,
                    nonce: nonce
                }).done(function (response) {
                    jQuery(id).html(response.html);
                    jQuery(window).trigger("pplcz-refresh-".concat(orderId));
                });
            },
            "onFinish": function () {
                // @ts-ignore
                wp.ajax.post({
                    action: "pplcz_order_panel",
                    orderId: orderId,
                    nonce: nonce
                }).done(function (response) {
                    unmount();
                    jQuery(id).html(response.html);
                    jQuery(window).trigger("pplcz-refresh-".concat(orderId));
                });
            }
        }]);
};
var form = function (nonce, orderId, shipment) {
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    if (shipment)
        renderForm(nonce, orderId, shipment);
    else {
        // @ts-ignore
        wp.ajax.post({
            action: "pplcz_order_panel_prepare_package",
            orderId: orderId,
            nonce: nonce
        }).done(function (response) {
            jQuery(id).html(response.html);
            renderForm(nonce, orderId, response.shipment);
        });
    }
};
exports.form = form;


/***/ }),

/***/ "./src/order/labels.tsx":
/*!******************************!*\
  !*** ./src/order/labels.tsx ***!
  \******************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
exports.create_labels = exports.create_labels2 = exports.set_print_setting = exports.test_labels = void 0;
var test_labels = function (nonce, orderId, shipmentId) {
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    jQuery(id).find('button').attr("disabled", "disabled");
    // @ts-ignore
    wp.ajax.post({
        action: "pplcz_order_panel_test_labels",
        orderId: orderId,
        shipmentId: shipmentId,
        nonce: nonce
    }).done(function (response) {
        var hasLabels = !!jQuery("".concat(id, " .refresh-shipments-labels")).length;
        jQuery(id).html(response.html);
        var afterHasLabels = !!jQuery("".concat(id, " .refresh-shipments-labels")).length;
        if (hasLabels && !afterHasLabels) {
            var allLabels = jQuery("".concat(id, " .all-labels"))[0];
            if (allLabels instanceof HTMLLinkElement) {
                document.location = allLabels.href;
            }
        }
        jQuery(window).trigger("pplcz-refresh-".concat(orderId));
    }).fail(function (response) {
        jQuery(id).find('button').removeAttr("disabled");
        if (typeof response === "string") {
            // @ts-ignore
            wp.data.dispatch('core/notices').createNotice('error', 
            // Can be one of: success, info, warning, error.
            response, 
            // Text string to display.
            {
                isDismissible: true // Whether the user can dismiss the notice.
                // Any actions the user can perform.
            });
        }
        else {
            jQuery(id).html(response.html);
            // @ts-ignore
            wp.data.dispatch('core/notices').createNotice('error', 
            // Can be one of: success, info, warning, error.
            response.message, 
            // Text string to display.
            {
                isDismissible: true // Whether the user can dismiss the notice.
                // Any actions the user can perform.
            });
        }
    });
};
exports.test_labels = test_labels;
var set_print_setting = function (nonce, orderId, shipmentId, value, optionals) {
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    jQuery(id).find('button').attr("disabled", "disabled");
    // @ts-ignore
    var PPLczPlugin = window.PPLczPlugin = window.PPLczPlugin || [];
    PPLczPlugin.push(["wpUpdateStyle", "pplcz-order-panel-shipment-div-".concat(orderId, "-overlay")]);
    var unmount = null;
    var render = null;
    var item = jQuery("<div>").prependTo("body")[0];
    var response = null;
    var onFinish = function () {
        if (response) {
            unmount();
            jQuery(id).html(response);
            jQuery(window).trigger("pplcz-refresh-".concat(orderId));
        }
        else {
            unmount();
            // @ts-ignore
            wp.ajax.post({
                action: "pplcz_change_print",
                print: value,
                orderId: orderId,
                shipmentId: shipmentId,
                nonce: nonce
            }).done(function (response) {
                jQuery(id).html(response.html);
                jQuery(window).trigger("pplcz-refresh-".concat(orderId));
            });
        }
    };
    var onChange = function (newval) {
        value = newval;
        render({
            optionals: optionals,
            value: value,
            onFinish: onFinish,
            onChange: onChange
        });
        response = null;
        // @ts-ignore
        wp.ajax.post({
            action: "pplcz_change_print",
            print: value,
            orderId: orderId,
            shipmentId: shipmentId,
            nonce: nonce
        }).done(function (resp) {
            response = resp.html;
        });
    };
    PPLczPlugin.push(["selectLabelPrint", item, {
            optionals: optionals,
            value: value,
            onFinish: onFinish,
            onChange: onChange,
            "returnFunc": function (data) {
                unmount = data.unmount;
                render = data.render;
            }
        }]);
};
exports.set_print_setting = set_print_setting;
var create_labels2 = function (nonce, orderId, shipment) {
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    jQuery(id).find('button').attr("disabled", "disabled");
    // @ts-ignore
    var PPLczPlugin = window.PPLczPlugin = window.PPLczPlugin || [];
    PPLczPlugin.push(["wpUpdateStyle", "pplcz-order-panel-shipment-div-".concat(orderId, "-overlay")]);
    var unmount = null;
    var item = jQuery("<div>").prependTo("body")[0];
    PPLczPlugin.push(["newLabel", item, {
            "hideOrderAnchor": false,
            "shipment": shipment,
            "returnFunc": function (data) {
                unmount = data.unmount;
            },
            "onFinish": function () {
                // @ts-ignore
                wp.ajax.post({
                    action: "pplcz_order_panel",
                    orderId: orderId,
                    nonce: nonce
                }).done(function (response) {
                    unmount();
                    jQuery(id).html(response.html);
                    jQuery(window).trigger("pplcz-refresh-".concat(orderId));
                });
            }
        }]);
};
exports.create_labels2 = create_labels2;
var create_labels = function (nonce, orderId, shipmentId) {
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    jQuery(id).find('button').attr("disabled", "disabled");
    // @ts-ignore
    wp.ajax.post({
        action: "pplcz_order_panel_create_labels",
        orderId: orderId,
        shipmentId: shipmentId,
        nonce: nonce
    }).done(function (response) {
        jQuery(id).html(response.html);
        jQuery(window).trigger("pplcz-refresh-".concat(orderId));
    }).fail(function (response) {
        jQuery(id).find('button').removeAttr("disabled");
        if (typeof response === "string") {
            // @ts-ignore
            wp.data.dispatch('core/notices').createNotice('error', 
            // Can be one of: success, info, warning, error.
            response, 
            // Text string to display.
            {
                isDismissible: true // Whether the user can dismiss the notice.
                // Any actions the user can perform.
            });
        }
        else {
            jQuery(id).html(response.html);
            jQuery(window).trigger("pplcz-refresh-".concat(orderId));
            // @ts-ignore
            wp.data.dispatch('core/notices').createNotice('error', 
            // Can be one of: success, info, warning, error.
            response.message, 
            // Text string to display.
            {
                isDismissible: true // Whether the user can dismiss the notice.
                // Any actions the user can perform.
            });
        }
    });
};
exports.create_labels = create_labels;


/***/ }),

/***/ "./src/order/panel.tsx":
/*!*****************************!*\
  !*** ./src/order/panel.tsx ***!
  \*****************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
exports.panel = void 0;
var changePackages_1 = __webpack_require__(/*! ./changePackages */ "./src/order/changePackages.tsx");
var form_1 = __webpack_require__(/*! ./form */ "./src/order/form.tsx");
var labels_1 = __webpack_require__(/*! ./labels */ "./src/order/labels.tsx");
var panel = function (element) {
    var orderId = jQuery(element).data('orderid');
    var nonce = jQuery(element).data('nonce');
    var elementId = element.id;
    jQuery(window).off("pplcz-refresh-".concat(orderId)).on("pplcz-refresh-".concat(orderId), function () {
        (0, exports.panel)(jQuery("#".concat(elementId))[0]);
    });
    jQuery(window).find("pplcz-refresh-".concat(orderId));
    var id = "#pplcz-order-panel-shipment-div-".concat(orderId, "-overlay");
    jQuery("".concat(id, " *")).off('click.pplcz-events').off("change.pplcz-events");
    jQuery("".concat(id, " .pplcz_available_print_setting")).off("click.pplcz-event").on("click.pplcz-events", function (ev) {
        ev.preventDefault();
        var item = this;
        var optionals = jQuery(item).data("optionals");
        var value = jQuery(item).data("value");
        var shipmentId = jQuery(item).data("shipmentid");
        (0, labels_1.set_print_setting)(nonce, orderId, shipmentId, value, optionals);
    });
    jQuery("".concat(id, " .add-package")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipmentId = _a.shipmentid;
        (0, changePackages_1.addPackage)(nonce, orderId, shipmentId);
    });
    jQuery("".concat(id, " .remove-package")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipmentId = _a.shipmentid;
        (0, changePackages_1.removePackage)(nonce, orderId, shipmentId);
    });
    jQuery("".concat(id, " .detail-shipment")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipment = _a.shipment;
        (0, form_1.form)(nonce, orderId, shipment);
    });
    jQuery("".concat(id, " .cancel-package")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipmentId = _a.shipmentid, packageId = _a.packageid;
        (0, changePackages_1.cancelPackage)(nonce, orderId, shipmentId, packageId);
    });
    jQuery("".concat(id, " .test-labels")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipmentId = _a.shipmentid;
        (0, labels_1.create_labels)(nonce, orderId, shipmentId);
    });
    jQuery("".concat(id, " .create-labels")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipment = _a.shipment;
        (0, labels_1.create_labels2)(nonce, orderId, shipment);
    });
    jQuery("".concat(id, " .remove-shipment")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipmentId = _a.shipmentid;
        (0, changePackages_1.removeShipment)(nonce, orderId, shipmentId);
    });
    jQuery("".concat(id, " .refresh-shipments")).on('click.pplcz-events', function (e) {
        e.preventDefault();
        var _a = jQuery(e.currentTarget).data(), orderId = _a.orderid, shipmentId = _a.shipmentid;
        (0, labels_1.test_labels)(nonce, orderId, shipmentId);
    });
    jQuery("".concat(id, " .refresh-shipments-labels")).each(function () {
        var _a = jQuery(this).data(), orderId = _a.orderid, shipmentId = _a.shipmentid;
        setTimeout(function () {
            (0, labels_1.test_labels)(nonce, orderId, shipmentId);
        }, 2000);
    });
};
exports.panel = panel;


/***/ }),

/***/ "./src/order/parcelshop.tsx":
/*!**********************************!*\
  !*** ./src/order/parcelshop.tsx ***!
  \**********************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
exports.parcelshop = void 0;
var data_1 = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
var observer = false;
var elements = [];
function parcelshop(element) {
    if (!observer) {
        observer = true;
        var timeout_1 = null;
        var mut = new MutationObserver(function (mutations) {
            for (var _i = 0, mutations_1 = mutations; _i < mutations_1.length; _i++) {
                var mutation = mutations_1[_i];
                if (mutation.type === 'childList') {
                    mutation.addedNodes.forEach(function (node) {
                        if (timeout_1)
                            return;
                        timeout_1 = setTimeout(function () {
                            timeout_1 = false;
                            jQuery(".pplcz_parcelshop_orderitems").each(function () {
                                if (elements.indexOf(this) > -1)
                                    return;
                                elements.push(this);
                                parcelshop(this);
                            });
                        }, 500);
                    });
                }
            }
        });
        var config = {
            childList: true,
            subtree: true
        };
        mut.observe(jQuery('#post-body')[0], config);
    }
    var input = jQuery(element).find("input");
    var meta_id = input.data('meta_id');
    var order_id = input.data('order_id');
    var nonce = input.data('nonce');
    var container = jQuery(element);
    var error = function () {
        // @ts-ignore
        (0, data_1.dispatch)("core/notices").createNotice('error', 
        // Can be one of: success, info, warning, error.
        'Problém se změnou parcelshop/parcelboxu.', 
        // Text string to display.
        {
            isDismissible: true // Whether the user can dismiss the notice.
        });
    };
    var clickName = "pplcz_parcelshop_".concat(meta_id);
    jQuery(".".concat(clickName)).off(".".concat(clickName));
    var onComplete = function (shipping_address) {
        jQuery.ajax({
            // @ts-ignore
            url: pplcz_data.ajax_url,
            type: "post",
            dataType: "json",
            data: {
                action: "pplcz_render_parcel_shop",
                meta_id: meta_id,
                order_id: order_id,
                shipping_address: shipping_address,
                nonce: nonce
            },
            error: error,
            success: function (data) {
                if (data.success) {
                    var newcontent = jQuery(data.data.content);
                    container.replaceWith(newcontent);
                    newcontent.show();
                    parcelshop(newcontent);
                    newcontent.find('button').css('display', 'inline');
                }
                else {
                    // @ts-ignore
                    error();
                }
            }
        });
    };
    container.addClass(clickName).on("click.".concat(clickName), ".pplcz_parcelshop_parcelshop", function (e) {
        e.preventDefault();
        PplMap(onComplete, {
            parcelShop: true
        });
    }).on("click.click.".concat(clickName), ".pplcz_parcelshop_parcelbox", function (e) {
        e.preventDefault();
        PplMap(onComplete, {
            parcelBox: true
        });
    }).on("click.click.".concat(clickName), ".pplcz_parcelshop_clear", function (e) {
        e.preventDefault();
        onComplete(null);
    });
    var parent = container.closest("tr[data-order_item_id=\"".concat(meta_id, "\"]"));
    parent.addClass(clickName).one("click.".concat(clickName), "a.edit-order-item", function () {
        container.find("button").css("display", "inline");
        setTimeout(function () {
            parent.find("select").filter(function (x, y) {
                return y.name === "shipping_method[".concat(meta_id, "]");
            }).addClass(clickName).on("change.".concat(clickName), function () {
                var val = jQuery(this).val();
                if (val.includes("pplcz_")) {
                    container.show();
                    container.find('button').css('display', 'block');
                }
                else {
                    container.hide();
                    container.find('button').css('display', 'none');
                }
            });
        }, 300);
    });
}
exports.parcelshop = parcelshop;
exports["default"] = parcelshop;


/***/ }),

/***/ "./src/order/table.tsx":
/*!*****************************!*\
  !*** ./src/order/table.tsx ***!
  \*****************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
var InitOrderTable = function (form) {
    setTimeout(function () {
        jQuery("#cb-select-all-1, #cb-select-all-1").off("click.pplcz_table_column").on("click.pplcz_table_column", function () {
            setTimeout(function () {
                if (!jQuery("input").toArray().some(function (item) {
                    var jQueryItem = jQuery(item);
                    if (jQueryItem.is(":checked") && jQueryItem.data("pplcz-shipment-data-create-shipment")) {
                        return true;
                    }
                    return false;
                })) {
                    jQuery("#pplcz-create-shipments").hide();
                }
                else {
                    jQuery("#pplcz-create-shipments").show();
                }
            });
        });
        function show_create_labels(ev) {
            ev.preventDefault();
            var orderIds = [];
            var output = [];
            jQuery("input:checked").toArray().some(function (item) {
                // @ts-ignore
                var val = item.value;
                var jQueryItem = jQuery("#pplcz-order-".concat(val, "-overlay"));
                var shipments = jQueryItem.data('shipments');
                if (shipments) {
                    orderIds.push(val);
                    shipments.forEach(function (shipment) {
                        output.push({
                            shipment: shipment
                        });
                    });
                }
            });
            if (output.length) {
                var unmount = null;
                // @ts-ignore
                var PPLczPlugin = window.PPLczPlugin || [];
                var div = jQuery("<div>").appendTo("body");
                PPLczPlugin.push(["newLabels", div[0], {
                        shipments: output,
                        "returnFunc": function (data) {
                            unmount = data.unmount;
                        },
                        onFinish: function () {
                            // @ts-ignore
                            wp.ajax.post({
                                action: "pplcz_orders_table",
                                orderIds: orderIds
                            }).done(function (item) {
                                Object.keys(item.orders).forEach(function (key) {
                                    jQuery("#pplcz-order-" + key + "-overlay").replaceWith(item.orders[key]);
                                });
                            });
                            unmount();
                        },
                        onRefresh: function (orderIds) {
                            // @ts-ignore
                            wp.ajax.post({
                                action: "pplcz_orders_table",
                                orderIds: orderIds
                            }).done(function (item) {
                                Object.keys(item.orders).forEach(function (key) {
                                    jQuery("#pplcz-order-" + key + "-overlay").replaceWith(item.orders[key]);
                                });
                            });
                        }
                    }]);
            }
        }
        jQuery("#doaction2, #doaction").off("click.pplcz-create-shipments").on("click.pplcz-create-shipments", function (ev) {
            var value = jQuery("#bulk-action-selector-top").val();
            if (value === 'pplcz_bulk_operation_create_labels') {
                show_create_labels(ev);
            }
        });
        jQuery("#wc-orders-filter #pplcz-create-shipments").off("click.pplcz-create-shipments").on("click.pplcz-create-shipments", show_create_labels);
        jQuery(".pplcz-order-table-panel").each(function (item) {
            var data = jQuery(this).data('shipments');
            var id = jQuery(this).data('orderid');
            if (data) {
                jQuery("#cb-select-".concat(id)).off("click.pplcz-create-shipment").on("click.pplcz-create-shipment", function (e) {
                    var checkbox = jQuery(this);
                    if (checkbox.is(":checked")) {
                        jQuery("#pplcz-create-shipments").show();
                    }
                    else if (jQuery("input[type=checkbox]:checked").toArray().some(function (item) {
                        if (item.id.indexOf("cb-select-")) {
                            // @ts-ignore
                            var val = item.value;
                            if (jQuery("#pplcz-order-".concat(val, "-overlay")).data('orderid')) {
                                return true;
                            }
                        }
                        return false;
                    })) {
                        jQuery("#pplcz-create-shipments").show();
                    }
                    else {
                        jQuery("#pplcz-create-shipments").hide();
                    }
                });
            }
        });
    }, 1000);
};
exports["default"] = InitOrderTable;


/***/ }),

/***/ "./src/product/tab.tsx":
/*!*****************************!*\
  !*** ./src/product/tab.tsx ***!
  \*****************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {


var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
Object.defineProperty(exports, "__esModule", ({ value: true }));
var react_1 = __webpack_require__(/*! react */ "react");
var element_1 = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
var react_hook_form_1 = __webpack_require__(/*! react-hook-form */ "./node_modules/react-hook-form/dist/index.cjs.js");
var Tab = function (props) {
    var _a = (0, react_hook_form_1.useForm)({
        defaultValues: __assign(__assign({}, (props.data || {})), { pplNonce: props.pplNonce })
    }), register = _a.register, control = _a.control;
    var float = {
        float: "none",
        width: "auto"
    };
    var methods = (0, element_1.useMemo)(function () {
        var methods = props.methods.map(function (x) { return x; });
        methods.sort(function (x, y) {
            return x.title.localeCompare(y.title);
        });
        return methods;
    }, [props.methods]);
    return (0, react_1.createElement)("p", {
        className: "form-field"
    }, (0, react_1.createElement)("input", __assign({ type: "hidden" }, register("pplNonce"))), (0, react_1.createElement)("label", {
        style: float,
        htmlFor: "pplConfirmAge15"
    }, (0, react_1.createElement)("input", __assign({ style: float, id: "pplConfirmAge15", type: "checkbox" }, register("pplConfirmAge15"))), "\xA0 Ov\u011B\u0159en\xED v\u011Bku 15+"), (0, react_1.createElement)("br", null), (0, react_1.createElement)("label", {
        style: float,
        htmlFor: "pplConfirmAge18"
    }, (0, react_1.createElement)("input", __assign({ style: float, id: "pplConfirmAge18", type: "checkbox" }, register("pplConfirmAge18"))), "\xA0 Ov\u011B\u0159en\xED v\u011Bku 18+"), (0, react_1.createElement)("br", null), (0, react_1.createElement)("label", {
        style: float
    }, (0, react_1.createElement)("strong", null, "Seznam zak\xE1zan\xFDch metod")), (0, react_1.createElement)("br", null), methods.map(function (shipment) {
        return (0, react_1.createElement)(react_hook_form_1.Controller, {
            control: control,
            name: "pplDisabledTransport",
            render: function (props) {
                var value = props.field.value || [];
                var checked = value.indexOf(shipment.code) > -1;
                return (0, react_1.createElement)("div", null, (0, react_1.createElement)("label", {
                    style: float,
                    htmlFor: "pplDisabledTransport_".concat(shipment.code)
                }, (0, react_1.createElement)("input", {
                    value: "".concat(shipment.code),
                    style: float,
                    id: "pplDisabledTransport_".concat(shipment.code),
                    type: "checkbox",
                    name: "pplDisabledTransport[]",
                    checked: checked,
                    onChange: function (x) {
                        if (value.indexOf(shipment.code) > -1)
                            props.field.onChange(value.filter(function (x) { return x !== shipment.code; }));
                        else
                            props.field.onChange(value.concat([shipment.code]));
                    }
                }), "\xA0 ", shipment.title));
            }
        });
    }));
};
function product_tab(element, props) {
    var el = element;
    (0, element_1.render)((0, react_1.createElement)(Tab, __assign({}, props)), el);
}
exports["default"] = product_tab;


/***/ }),

/***/ "./src/shipment/shipment.tsx":
/*!***********************************!*\
  !*** ./src/shipment/shipment.tsx ***!
  \***********************************/
/***/ ((__unused_webpack_module, exports) => {


Object.defineProperty(exports, "__esModule", ({ value: true }));
exports.shipment = void 0;
var shipment = function () {
    var dph = jQuery(jQuery("input").toArray().filter(function (x) { return x.name.indexOf("_priceWithDph") > -1; })[0]);
    var disablePayments = jQuery(jQuery("select").toArray().filter(function (x) { return x.name.indexOf("_disablePayments") > -1; })[0]);
    disablePayments.closest('tr').before("<tr><td colspan=\"50\"><hr></td></tr>");
    var inputs = dph.closest('table').find("input").toArray().filter(function (x) { return x.name.indexOf('pplcz_') > -1; }).filter(function (x) { return x.name.match(/_[A-Z]{3}$/); });
    var currencies = inputs.map(function (x) { return x.name.match(/[A-Z]{3}$/); }).reduce(function (acc, currency) {
        if (acc.indexOf(currency[0]) > -1)
            return acc;
        acc.push(currency[0]);
        return acc;
    }, []);
    var allInputs = inputs.map(function (x) { return x.name; });
    var titleId = 'pplcz_title';
    var data = jQuery("<tr>\n      <th colspan=\"50\" class=\"titledesc\">\n          ".concat(currencies.map(function (x) {
        return "<a href='#currency_".concat(x, "'>").concat(x, "</a>");
    }).join(" | "), "\n        <hr>\n            <div id='").concat(titleId, "'></div>\n      </th>\n</tr>")).on('click', 'a', function (ev) {
        ev.preventDefault();
        jQuery(ev.currentTarget).closest('tr').find('a').css('font-weight', 'normal');
        jQuery(ev.currentTarget).css('font-weight', 'bold');
        var currency = "".concat(ev.currentTarget.href).match(/currency_([A-Z]{3})$/)[1];
        allInputs.forEach(function (x) {
            var cur = x.substring(x.length - 3);
            if (cur === currency)
                jQuery('#' + x).closest('tr').show();
            else
                jQuery('#' + x).closest('tr').hide();
        });
        jQuery("#".concat(titleId)).html("Nastaven\u00ED pro m\u011Bnu: ".concat(currency));
    });
    dph.closest('tr').after(data);
    dph.closest('table').find('input[type=checkbox]').closest('label').css('min-width', '250px');
    allInputs.forEach(function (x) {
        if (x.indexOf("cost_automatic_recalculation_") !== -1) {
            jQuery("#".concat(x)).on('change', function () {
                var currency = x.substring(x.length - 3);
                var updatedInput = allInputs.filter(function (item) { return item.substring(item.length - 3) === currency; }).map(function (x) { return jQuery("#".concat(x)).closest('tr'); });
                if (jQuery(this).is(":checked")) {
                    updatedInput.forEach(function (x) {
                        x.find('.shipment-price-original').hide();
                        x.find('.shipment-price-base').show();
                    });
                }
                else {
                    updatedInput.forEach(function (x) {
                        x.find('.shipment-price-original').show();
                        x.find('.shipment-price-base').hide();
                    });
                }
            }).trigger('change');
        }
    });
    data.find('a:first-child').click();
};
exports.shipment = shipment;
exports["default"] = exports.shipment;


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _product_tab__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./product/tab */ "./src/product/tab.tsx");
/* harmony import */ var _product_tab__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_product_tab__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _order_parcelshop__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./order/parcelshop */ "./src/order/parcelshop.tsx");
/* harmony import */ var _order_panel__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./order/panel */ "./src/order/panel.tsx");
/* harmony import */ var _reset_styles_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./reset-styles.scss */ "./src/reset-styles.scss");
/* harmony import */ var _category_init__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./category/init */ "./src/category/init.js");
/* harmony import */ var _product_init__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./product/init */ "./src/product/init.js");
/* harmony import */ var _order_table__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./order/table */ "./src/order/table.tsx");
/* harmony import */ var _shipment_shipment__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./shipment/shipment */ "./src/shipment/shipment.tsx");








window.PPLczPlugin = window.PPLczPlugin || [];
const PPLczPlugin = window.PPLczPlugin;
PPLczPlugin.pplczInitCategoryTab = _category_init__WEBPACK_IMPORTED_MODULE_4__["default"];
PPLczPlugin.pplczInitProductTab = _product_init__WEBPACK_IMPORTED_MODULE_5__["default"];
PPLczPlugin.pplczInitOrderPanel = _order_panel__WEBPACK_IMPORTED_MODULE_2__.panel;
PPLczPlugin.pplczPPLParcelshop = _order_parcelshop__WEBPACK_IMPORTED_MODULE_1__["default"];
PPLczPlugin.pplczInitOrderTable = _order_table__WEBPACK_IMPORTED_MODULE_6__["default"];
PPLczPlugin.pplczInitSettingShipment = _shipment_shipment__WEBPACK_IMPORTED_MODULE_7__["default"];
})();

/******/ })()
;
//# sourceMappingURL=index.js.map