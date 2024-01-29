'use strict';

define([
    'ko',
    'uiComponent'
], function (ko, Component) {
    return Component.extend({
        defaults: {
            template: 'Magento_Catalog/input-counter.html'
        },

        initialize: function () {
            this._super()
                .observe('qty');

            return this;
        },

        getDataValidator: function () {
            return JSON.stringify(this.validatesData);
        },

        addQty: function () {
            let qty

            if (isNaN(this.qty())) {
                qty = 1;
            } else {
                qty = this.qty() + 1;
            }

            this.qty(qty);
        },

        removeQty: function () {
            let qty;

            if (this.qty() > 1) {
                qty = this.qty() - 1;
            } else {
                qty = 1;
            }

            this.qty(qty);
        }
    });
});
