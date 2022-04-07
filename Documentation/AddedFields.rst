.. include:: /Includes.rst.txt

.. _added-fields:

==================================
Fields added to the FE users table
==================================

In addition to the existing FE user fields, this extension adds the following
fields to the FE users table:

*  :php:`full salutation`, e.g., "Hello Mr. Klee" (to work around the futile
   problem of trying to automatically generate gender-specific salutations)
*  :php:`gender` (with the mappings from `sr_feuser_register`)
*  :php:`date_of_birth`
*  :php:`zone` (state/province)
*  :php:`privacy` (privacy agreement accepted)
*  :php:`status` (job status)
*  :php:`comments`

The :php:`FrontendUserWithCountryRepository` model additionally provides this
field:

*  :php:`static_info_country` (the ISO 3166-1 A3 country code)
