Handlebars.partials["devices-columns"] = Handlebars.template({"1":function(container,depth0,helpers,partials,data) {
    var helper, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return "            <div class=\"column is-one-third is-narrow\">\n                <div class=\"card\">\n                    <div class=\"card-image\">\n                        <figure class=\"image is-4by5\">\n                            <img src=\""
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"image") || (depth0 != null ? lookupProperty(depth0,"image") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"image","hash":{},"data":data,"loc":{"start":{"line":7,"column":38},"end":{"line":7,"column":47}}}) : helper)))
    + "\" alt=\"\">\n                        </figure>\n                    </div>\n                    <div class=\"card-content\">\n                        <div class=\"media\">\n                            <div class=\"media-content\">\n                                <p class=\"title is-4\">"
    + container.escapeExpression(((helper = (helper = lookupProperty(helpers,"name") || (depth0 != null ? lookupProperty(depth0,"name") : depth0)) != null ? helper : container.hooks.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"name","hash":{},"data":data,"loc":{"start":{"line":13,"column":54},"end":{"line":13,"column":62}}}) : helper)))
    + "</p>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n            </div>\n";
},"compiler":[8,">= 4.3.0"],"main":function(container,depth0,helpers,partials,data) {
    var stack1, lookupProperty = container.lookupProperty || function(parent, propertyName) {
        if (Object.prototype.hasOwnProperty.call(parent, propertyName)) {
          return parent[propertyName];
        }
        return undefined
    };

  return "\n"
    + ((stack1 = lookupProperty(helpers,"each").call(depth0 != null ? depth0 : (container.nullContext || {}),(data && lookupProperty(data,"root")),{"name":"each","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data,"loc":{"start":{"line":2,"column":8},"end":{"line":19,"column":17}}})) != null ? stack1 : "")
    + "    ";
},"useData":true});