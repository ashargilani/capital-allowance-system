$(document).ready(function () {
    var asset = {
        init: function () {
            $(document).on('change', '#purchase-cost', function () {
                var purchaseCost = $(this).val();
                if(purchaseCost) {
                    asset.setAnnualDeprecationValue(purchaseCost);
                    asset.setInitialAllowanceValue(purchaseCost);
                    asset.setAnnualAllowanceValue(purchaseCost);
                } else {
                    asset.setAllDerivedFieldsToEmpty();
                }
            });
        },
        getAssetGroup: function () {
            var assetGroup = $('#asset-group');
            if(assetGroup.attr('selectedIndex') == 0) {
                alert('Please select asset group first');
                assetGroup.focus();

                return;
            }

            return assetGroup;
        },
        setAnnualDeprecationValue: function (purchaseCostValue) {
            var deprecationRate = asset.getDeprecationRate();
            if(deprecationRate) {
                //Finding deprecation factor
                var deprecationFactor = deprecationRate/100;
                //Finding annual deprecation
                var annualDeprecation = deprecationFactor * purchaseCostValue;
                asset.setAnnualDeprecationValueInField(annualDeprecation);
            }
        },
        getDeprecationRate: function() {
            var assetGroup = asset.getAssetGroup();
            if(assetGroup) {
                return assetGroup.find(":selected").attr('data-dep_input_percentage');
            } else {
                return false;
            }
        },
        setAnnualDeprecationValueInField: function (annualDepreceationValue) {
            $('#annual-depreceation').val(annualDepreceationValue);
        },
        setInitialAllowanceValue: function (purchaseCostValue) {
            var initialAllowanceRate = asset.getInitialAllowanceRate();
            if(initialAllowanceRate) {
                var initialAllowance = asset.getInitialAllowanceValue(purchaseCostValue, initialAllowanceRate);
                asset.setInitialAllowanceValueInField(initialAllowance);
            }
        },
        getInitialAllowanceRate: function () {
            var assetGroup = asset.getAssetGroup();
            if(assetGroup) {
                return assetGroup.find(":selected").data('ca_initial_allowance_percentage');
            } else {
                return false;
            }
        },
        getInitialAllowanceValue: function (purchaseCostValue, initialAllowancePercentageRate) {
            var initialAllowanceFactor = initialAllowancePercentageRate/100;

            return initialAllowanceFactor * purchaseCostValue;
        },
        setInitialAllowanceValueInField: function (initialAllowanceValue) {
            $('#initial-allowance').val(initialAllowanceValue);
        },
        setAnnualAllowanceValue: function (purchaseCostValue) {
            var annualAllowanceRate = asset.getAnnualAllowanceRate();
            if(annualAllowanceRate) {
                var annualAllowance = asset.getAnnualAllowanceValue(purchaseCostValue, annualAllowanceRate);
                asset.setAnnualAllowanceValueInField(annualAllowance);
            }
        },
        getAnnualAllowanceRate: function () {
            var assetGroup = asset.getAssetGroup();
            if(assetGroup) {
                return assetGroup.find(":selected").data('ca_annual_allowance_percentage');
            } else {
                return false;
            }
        },
        getAnnualAllowanceValue: function (purchaseCostValue, annualAllowanceRate) {
            var annualAllowanceFactor = annualAllowanceRate/100;
            var initialAllowanceRate = asset.getInitialAllowanceRate();
            if(initialAllowanceRate && initialAllowanceRate > 0) {
                var initialAllowance = asset.getInitialAllowanceValue(purchaseCostValue, initialAllowanceRate);
                var remainingCostForAnnualAllowance = purchaseCostValue - initialAllowance;

                return annualAllowanceFactor * remainingCostForAnnualAllowance;
            }

            return annualAllowanceFactor * purchaseCostValue;
        },
        setAnnualAllowanceValueInField: function (annualAllowance) {
            $('#annual-allowance').val(annualAllowance);
        },
        setAllDerivedFieldsToEmpty: function () {
            $('#annual-depreceation, #initial-allowance, #annual-allowance, #investment-allowance').val('');
        }
    };
    asset.init();
});
