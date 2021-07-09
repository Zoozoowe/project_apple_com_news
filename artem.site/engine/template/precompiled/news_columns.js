Handlebars.partials["news-columns"] = Handlebars.template({"1":function(container,depth0,helpers,partials,data) {
    var stack1, helper, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return "			<div class=\"column is-one-third is-narrow\">\n				<div class=\"card\">\n					<div class=\"card-image\">\n"
    + ((stack1 = (lookupProperty(helpers,"switch")||(depth0 && lookupProperty(depth0,"switch"))||container.hooks.helperMissing).call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? lookupProperty(depth0,"attType") : depth0),{"name":"switch","hash":{},"fn":container.program(2, data, 0),"inverse":container.noop,"data":data,"loc":{"start":{"line":6,"column":6},"end":{"line":22,"column":17}}})) != null ? stack1 : "")
    + "					</div>\n					<div class=\"card-content\">\n						<div class=\"media\">\n							<div class=\"media-content\">\n								<a href=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"url") || (depth0 != null ? lookupProperty(depth0,"url") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"url","hash":{},"data":data,"loc":{"start":{"line":27,"column":17},"end":{"line":27,"column":24}}}) : helper)))
    + "\">\n									<p class=\"title is-4\">"
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"title") || (depth0 != null ? lookupProperty(depth0,"title") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"title","hash":{},"data":data,"loc":{"start":{"line":28,"column":31},"end":{"line":28,"column":40}}}) : helper)))
    + "</p>\n								</a>\n							</div>\n						</div>\n					</div>\n				</div>\n			</div>\n";
},"2":function(container,depth0,helpers,partials,data) {
    var stack1, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return ((stack1 = (lookupProperty(helpers,"case")||(depth0 && lookupProperty(depth0,"case"))||container.hooks.helperMissing).call(depth0 != null ? depth0 : (container.nullContext || {}),"image",{"name":"case","hash":{},"fn":container.program(3, data, 0),"inverse":container.noop,"data":data,"loc":{"start":{"line":7,"column":7},"end":{"line":11,"column":16}}})) != null ? stack1 : "")
    + "\n"
    + ((stack1 = (lookupProperty(helpers,"case")||(depth0 && lookupProperty(depth0,"case"))||container.hooks.helperMissing).call(depth0 != null ? depth0 : (container.nullContext || {}),"video",{"name":"case","hash":{},"fn":container.program(5, data, 0),"inverse":container.noop,"data":data,"loc":{"start":{"line":13,"column":7},"end":{"line":21,"column":16}}})) != null ? stack1 : "");
},"3":function(container,depth0,helpers,partials,data) {
    var helper, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return "							<figure class=\"image is-5by4\">\n								<img src=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"attUrl") || (depth0 != null ? lookupProperty(depth0,"attUrl") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"attUrl","hash":{},"data":data,"loc":{"start":{"line":9,"column":18},"end":{"line":9,"column":28}}}) : helper)))
    + "\" alt=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"attTitle") || (depth0 != null ? lookupProperty(depth0,"attTitle") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"attTitle","hash":{},"data":data,"loc":{"start":{"line":9,"column":35},"end":{"line":9,"column":47}}}) : helper)))
    + "\">\n							</figure>\n";
},"5":function(container,depth0,helpers,partials,data) {
    var helper, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return "							<figure class=\"video\">\n								<video src=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"attUrl") || (depth0 != null ? lookupProperty(depth0,"attUrl") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"attUrl","hash":{},"data":data,"loc":{"start":{"line":15,"column":20},"end":{"line":15,"column":30}}}) : helper)))
    + "\" alt=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"attTitle") || (depth0 != null ? lookupProperty(depth0,"attTitle") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"attTitle","hash":{},"data":data,"loc":{"start":{"line":15,"column":37},"end":{"line":15,"column":49}}}) : helper)))
    + "\" autoplay muted loop>\n									Sorry, your browser doesn't support embedded videos, \n									but don't worry, you can <a href=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"attUrl") || (depth0 != null ? lookupProperty(depth0,"attUrl") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"attUrl","hash":{},"data":data,"loc":{"start":{"line":17,"column":43},"end":{"line":17,"column":53}}}) : helper)))
    + "\">download it</a>\n									and watch it with your favorite video player!\n								</video>\n							</figure>\n";
},"compiler":[8,">= 4.3.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return "\n"
    + ((stack1 = lookupProperty(helpers,"each").call(depth0 != null ? depth0 : (container.nullContext || {}),(data && lookupProperty(data,"root")),{"name":"each","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data,"loc":{"start":{"line":2,"column":3},"end":{"line":35,"column":12}}})) != null ? stack1 : "")
    + "		";
},"useData":true});