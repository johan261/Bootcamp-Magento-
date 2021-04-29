define ([
    'jquery',
    'underscore',
    'ko',
    'uitlement',
    'mage/url',
    'mage/storage',
    'Magento_Customer/js/customer-data/'
 ], function ($, _, Component){
     return Component.extend({
         defaults: {
             blogs: ko.observableArray([]),
             template: 'OmniPro_Attributes/blog',
         
         },

        initialize: function (){
           this._super();
           console.log(this);
           var self = this;
           console.log(customerData.get('customer')());
           console.log(url.build());
           var blogs ="/rest/V1/blogs?searchCriteria"
           storage.grt(blogs)
           .done(function (response) {

              self.blogs(response.items)
              console.log(self.blogs());
           });
           return this; 
        }

     });
})