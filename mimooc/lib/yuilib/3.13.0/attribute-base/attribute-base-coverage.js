/*
YUI 3.13.0 (build 508226d)
Copyright 2013 Yahoo! Inc. All rights reserved.
Licensed under the BSD License.
http://yuilibrary.com/license/
*/

if (typeof __coverage__ === 'undefined') { __coverage__ = {}; }
if (!__coverage__['build/attribute-base/attribute-base.js']) {
   __coverage__['build/attribute-base/attribute-base.js'] = {"path":"build/attribute-base/attribute-base.js","s":{"1":0,"2":0,"3":0,"4":0,"5":0,"6":0,"7":0,"8":0,"9":0,"10":0,"11":0,"12":0},"b":{},"f":{"1":0,"2":0},"fnMap":{"1":{"name":"(anonymous_1)","line":1,"loc":{"start":{"line":1,"column":26},"end":{"line":1,"column":45}}},"2":{"name":"Attribute","line":56,"loc":{"start":{"line":56,"column":4},"end":{"line":56,"column":25}}}},"statementMap":{"1":{"start":{"line":1,"column":0},"end":{"line":110,"column":91}},"2":{"start":{"line":56,"column":4},"end":{"line":60,"column":5}},"3":{"start":{"line":57,"column":8},"end":{"line":57,"column":47}},"4":{"start":{"line":58,"column":8},"end":{"line":58,"column":53}},"5":{"start":{"line":59,"column":8},"end":{"line":59,"column":49}},"6":{"start":{"line":62,"column":4},"end":{"line":62,"column":54}},"7":{"start":{"line":63,"column":4},"end":{"line":63,"column":56}},"8":{"start":{"line":66,"column":4},"end":{"line":66,"column":59}},"9":{"start":{"line":80,"column":4},"end":{"line":80,"column":60}},"10":{"start":{"line":94,"column":4},"end":{"line":94,"column":92}},"11":{"start":{"line":105,"column":4},"end":{"line":105,"column":58}},"12":{"start":{"line":107,"column":4},"end":{"line":107,"column":28}}},"branchMap":{},"code":["(function () { YUI.add('attribute-base', function (Y, NAME) {","","    /**","     * The attribute module provides an augmentable Attribute implementation, which","     * adds configurable attributes and attribute change events to the class being","     * augmented. It also provides a State class, which is used internally by Attribute,","     * but can also be used independently to provide a name/property/value data structure to","     * store state.","     *","     * @module attribute","     */","","    /**","     * The attribute-base submodule provides core attribute handling support, with everything","     * aside from complex attribute handling in the provider's constructor.","     *","     * @module attribute","     * @submodule attribute-base","     */","","    /**","     * <p>","     * Attribute provides configurable attribute support along with attribute change events. It is designed to be","     * augmented on to a host class, and provides the host with the ability to configure attributes to store and retrieve state,","     * along with attribute change events.","     * </p>","     * <p>For example, attributes added to the host can be configured:</p>","     * <ul>","     *     <li>As read only.</li>","     *     <li>As write once.</li>","     *     <li>With a setter function, which can be used to manipulate","     *     values passed to Attribute's <a href=\"#method_set\">set</a> method, before they are stored.</li>","     *     <li>With a getter function, which can be used to manipulate stored values,","     *     before they are returned by Attribute's <a href=\"#method_get\">get</a> method.</li>","     *     <li>With a validator function, to validate values before they are stored.</li>","     * </ul>","     *","     * <p>See the <a href=\"#method_addAttr\">addAttr</a> method, for the complete set of configuration","     * options available for attributes.</p>","     *","     * <p><strong>NOTE:</strong> Most implementations will be better off extending the <a href=\"Base.html\">Base</a> class,","     * instead of augmenting Attribute directly. Base augments Attribute and will handle the initial configuration","     * of attributes for derived classes, accounting for values passed into the constructor.</p>","     *","     * @class Attribute","     * @param attrs {Object} The attributes to add during construction (passed through to <a href=\"#method_addAttrs\">addAttrs</a>).","     *        These can also be defined on the constructor being augmented with Attribute by defining the ATTRS property on the constructor.","     * @param values {Object} The initial attribute values to apply (passed through to <a href=\"#method_addAttrs\">addAttrs</a>).","     *        These are not merged/cloned. The caller is responsible for isolating user provided values if required.","     * @param lazy {boolean} Whether or not to add attributes lazily (passed through to <a href=\"#method_addAttrs\">addAttrs</a>).","     * @uses AttributeCore","     * @uses AttributeObservable","     * @uses EventTarget","     * @uses AttributeExtras","     */","    function Attribute() {","        Y.AttributeCore.apply(this, arguments);","        Y.AttributeObservable.apply(this, arguments);","        Y.AttributeExtras.apply(this, arguments);","    }","","    Y.mix(Attribute, Y.AttributeCore, false, null, 1);","    Y.mix(Attribute, Y.AttributeExtras, false, null, 1);","","    // Needs to be `true`, to overwrite methods from AttributeCore","    Y.mix(Attribute, Y.AttributeObservable, true, null, 1);","","    /**","     * <p>The value to return from an attribute setter in order to prevent the set from going through.</p>","     *","     * <p>You can return this value from your setter if you wish to combine validator and setter","     * functionality into a single setter function, which either returns the massaged value to be stored or","     * AttributeCore.INVALID_VALUE to prevent invalid values from being stored.</p>","     *","     * @property INVALID_VALUE","     * @type Object","     * @static","     * @final","     */","    Attribute.INVALID_VALUE = Y.AttributeCore.INVALID_VALUE;","","    /**","     * The list of properties which can be configured for","     * each attribute (e.g. setter, getter, writeOnce etc.).","     *","     * This property is used internally as a whitelist for faster","     * Y.mix operations.","     *","     * @property _ATTR_CFG","     * @type Array","     * @static","     * @protected","     */","    Attribute._ATTR_CFG = Y.AttributeCore._ATTR_CFG.concat(Y.AttributeObservable._ATTR_CFG);","","    /**","     * Utility method to protect an attribute configuration hash, by merging the","     * entire object and the individual attr config objects.","     *","     * @method protectAttrs","     * @static","     * @param {Object} attrs A hash of attribute to configuration object pairs.","     * @return {Object} A protected version of the `attrs` argument.","     */","    Attribute.protectAttrs = Y.AttributeCore.protectAttrs;","","    Y.Attribute = Attribute;","","","}, '3.13.0', {\"requires\": [\"attribute-core\", \"attribute-observable\", \"attribute-extras\"]});","","}());"]};
}
var __cov_TuK8t1Q8XNmzTnaQZscKQQ = __coverage__['build/attribute-base/attribute-base.js'];
__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['1']++;YUI.add('attribute-base',function(Y,NAME){__cov_TuK8t1Q8XNmzTnaQZscKQQ.f['1']++;__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['2']++;function Attribute(){__cov_TuK8t1Q8XNmzTnaQZscKQQ.f['2']++;__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['3']++;Y.AttributeCore.apply(this,arguments);__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['4']++;Y.AttributeObservable.apply(this,arguments);__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['5']++;Y.AttributeExtras.apply(this,arguments);}__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['6']++;Y.mix(Attribute,Y.AttributeCore,false,null,1);__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['7']++;Y.mix(Attribute,Y.AttributeExtras,false,null,1);__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['8']++;Y.mix(Attribute,Y.AttributeObservable,true,null,1);__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['9']++;Attribute.INVALID_VALUE=Y.AttributeCore.INVALID_VALUE;__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['10']++;Attribute._ATTR_CFG=Y.AttributeCore._ATTR_CFG.concat(Y.AttributeObservable._ATTR_CFG);__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['11']++;Attribute.protectAttrs=Y.AttributeCore.protectAttrs;__cov_TuK8t1Q8XNmzTnaQZscKQQ.s['12']++;Y.Attribute=Attribute;},'3.13.0',{'requires':['attribute-core','attribute-observable','attribute-extras']});
