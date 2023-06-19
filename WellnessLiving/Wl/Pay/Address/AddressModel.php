<?php

namespace WellnessLiving\Wl\Pay\Address;

use WellnessLiving\WlModelAbstract;

/**
 * An endpoint that gets information about a user's payment addresses.
 */
class AddressModel extends WlModelAbstract
{
  /**
   * The payee's address information.
   *
   * @get result
   * @var array
   */
  public $a_pay_address;

  /**
   * The ID of the payment owner type.
   * One of {@link \WellnessLiving\WlPayOwnerSid} constants.
   *
   * @get get
   * @var int
   */
  public $id_pay_owner = 0;

  /**
   * Business key, where the payment is performed.
   * <tt>null</tt> if pay owner is not user.
   *
   * @get get
   * @var string
   */
  public $k_business;

  /**
   * The primary key of a payment owner.
   * This could be the business of the user depending on a {@link \Wellnessliving\Wl\Pay\Address\AddressModel::$id_pay_owner} value.
   *
   * @get get
   * @var string
   */
  public $k_id = '0';
}

?>