.. include:: /Includes.rst.txt

.. _extbase-models:

========================
Available Extbase models
========================

This extension provides the following Extbase models and repositories:

*  :php:`\OliverKlee\FeUserExtraFields\Domain\Model\FrontendUser`
*  :php:`\OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserGroup`
*  :php:`\OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserRepository`
*  :php:`\OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserGroupRepository`

These models and repositories can also be used as drop-in replacements for the
:php:`FrontEndUser` model and repository that were deprecated in TYPO3 V11 and
will be/have been removed in TYPO3 V12.

In addition, this extension provides a model and corresponding repository for
FE users with a country from the `static_info_tables` extension:

*  :php:`\OliverKlee\FeUserExtraFields\Domain\Model\FrontendUserWithCountry`
*  :php:`\OliverKlee\FeUserExtraFields\Domain\Repository\FrontendUserWithCountryRepository`

Validation
==========

Please note that the models do not provide any validation for their
properties (as the validation is expected to be specific to each application).
