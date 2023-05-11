<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Acquirer
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AcquirerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Acquirer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAcquirer {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $number
 * @property int $expiryMonth
 * @property int $expiryYear
 * @property int|null $startMonth
 * @property int|null $startYear
 * @property int|null $issueNumber
 * @property string|null $email
 * @property string|null $birthday
 * @property string|null $gender
 * @property string|null $billingTitle
 * @property string $billingFirstName
 * @property string $billingLastName
 * @property string|null $billingCompany
 * @property string $billingAddress1
 * @property string|null $billingAddress2
 * @property string $billingCity
 * @property string $billingPostcode
 * @property string|null $billingState
 * @property string $billingCountry
 * @property string|null $billingPhone
 * @property string|null $billingFax
 * @property string|null $shippingTitle
 * @property string $shippingFirstName
 * @property string $shippingLastName
 * @property string|null $shippingCompany
 * @property string $shippingAddress1
 * @property string|null $shippingAddress2
 * @property string $shippingCity
 * @property string $shippingPostcode
 * @property string|null $shippingState
 * @property string $shippingCountry
 * @property string|null $shippingPhone
 * @property string|null $shippingFax
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingPostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBillingTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereExpiryMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereExpiryYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereIssueNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingPostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereShippingTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereStartMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereStartYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer withoutTrashed()
 * @mixin \Eloquent
 */
	class IdeHelperCustomer {}
}

namespace App\Models{
/**
 * App\Models\Merchant
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MerchantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMerchant {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property string $transactionId
 * @property int $customer_id
 * @property int $merchant_id
 * @property int $acquirer_id
 * @property string $amount
 * @property string $currency
 * @property string|null $reference_no
 * @property string $status
 * @property string|null $channel
 * @property mixed|null $custom_data
 * @property string|null $chain_id
 * @property int|null $agent_info_id
 * @property string|null $operation
 * @property int|null $fx_transaction_id
 * @property int|null $acquirer_transaction_id
 * @property string|null $code
 * @property string|null $message
 * @property array|null $agent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Acquirer $acquirer
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\Merchant $merchant
 * @method static \Database\Factories\TransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAcquirerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAcquirerTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAgentInfoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereChainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCustomData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFxTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMerchantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReferenceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperTransaction {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

