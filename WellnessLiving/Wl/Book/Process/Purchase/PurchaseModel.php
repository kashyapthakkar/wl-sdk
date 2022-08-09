<?php

namespace WellnessLiving\Wl\Book\Process\Purchase;

use WellnessLiving\Wl\Book\WlBookModeSid;
use WellnessLiving\WlModelAbstract;

/**
 * Information about Purchase Options that can book specified session(s).
 */
class PurchaseModel extends WlModelAbstract
{
  /**
   * A list of Purchase Options which are available for session(s) that are being booked. Keys - unique string IDs. Values - arrays with the next keys:
   * <dl>
   *   <dt>
   *     array[] <var>a_installment_template</var>.
   *   </dt>
   *   <dd>
   *     A list of installment plans. Every element has the next keys:
   *     <dl>
   *       <dt>
   *         int <var>i_count</var>
   *       </dt>
   *       <dd>
   *          The number of payments.
   *       </dd>
   *       <dt>
   *         int <var>id_duration</var>
   *       </dt>
   *       <dd>
   *          The duration of a single period.
   *       </dd>
   *       <dt>
   *         int <var>i_period</var>
   *       </dt>
   *       <dd>
   *          The number of periods specified by <var>id_period</var> between individual payments.
   *       </dd>
   *       <dt>
   *         string <var>k_currency</var>
   *       </dt>
   *       <dd>
   *         The payment currency key.
   *       </dd>
   *       <dt>
   *         string <var>k_pay_installment_template</var>
   *       </dt>
   *       <dd>
   *          The key of the installment plan template.
   *       </dd>
   *       <dt>
   *         string <var>m_amount</var>
   *       </dt>
   *       <dd>
   *         The amount of the installment plan.
   *       </dd>
   *       <dt>
   *         string <var>s_duration</var>
   *       </dt>
   *       <dd>
   *         The title of the installment plan.
   *       </dd>
   *     </dl>
   *   </dd>
   *   <dt>
   *     array[] [<var>a_visit_limit</var>]
   *   </dt>
   *   <dd>
   *     Actual only for promotions. A list of limits on booking by the promotion. Every element has the next keys:
   *     <dl>
   *       <dt>
   *         string <var>s_title</var>
   *       </dt>
   *       <dd>
   *         A description of the limit.
   *       </dd>
   *     </dl>
   *   </dd>
   *   <dt>
   *     string <var>f_price</var>
   *   </dt>
   *   <dd>
   *     The price.
   *   </dd>
   *   <dt>
   *     string [<var>f_price_early</var>]
   *   </dt>
   *   <dd>
   *     The price for early bookings.
   *   </dd>
   *   <dt>
   *     string <var>html_description</var>
   *   </dt>
   *   <dd>
   *     The description, ready to paste in a browser.
   *   </dd>
   *   <dt>
   *     int [<var>i_limit</var>]
   *   </dt>
   *   <dd>
   *     The limit of sessions which may be booked by Purchase Options.
   *   </dd>
   *   <dt>
   *     int [<var>i_payment_period</var>]
   *   </dt>
   *   <dd>
   *     Actual only for promotions with program 'membership'. The duration of the regular payment interval.
   *   </dd>
   *   <dt>
   *     int [<var>i_session</var>]
   *   </dt>
   *   <dd>
   *     Actual only for purchases of single sessions. The number of sessions which are booked simultaneously.
   *   </dd>
   *   <dt>
   *     int [<var>id_program_category</var>]
   *   </dt>
   *   <dd>
   *     Actual only for promotions. The ID of the promotion program category. One of {@link RsProgramCategorySid} constants.
   *   </dd>
   *   <dt>
   *     int [<var>id_program_type</var>]
   *   </dt>
   *   <dd>
   *     Actual only for promotions. The ID of the promotion program type. One of {@link RsProgramTypeSid} constants.
   *   </dd>
   *   <dt>
   *     int <var>id_purchase_item</var>
   *   </dt>
   *   <dd>
   *     The ID of Purchase Option type. One of {@link RsPurchaseItemSid} constants.
   *   </dd>
   *   <dt>
   *     bool [<var>is_contract</var>]
   *   </dt>
   *   <dd>
   *     <tt>true</tt> - The Purchase Option requires a contract assignment; <tt>false</tt> - doesn't require assignment.
   *   </dd>
   *   <dt>
   *     bool [<var>is_convert</var>]
   *   </dt>
   *   <dd>
   *     <tt>true</tt> - after expiration, the Purchase Option should be converted to another instance; <tt>false</tt> - otherwise.
   *   </dd>
   *   <dt>
   *     bool [<var>is_renew</var>]
   *   </dt>
   *   <dd>
   *     <tt>true</tt> - the Purchase Option is renewable; <tt>false</tt> - otherwise.
   *   </dd>
   *   <dt>
   *     bool [<var>is_renew_check</var>]
   *   </dt>
   *   <dd>
   *     <tt>true</tt> - the Purchase Option is renewable and the "auto-renew" option should be turned on by default; <tt>false</tt> - otherwise.
   *   </dd>
   *   <dt>
   *     string <var>k_id</var>
   *   </dt>
   *   <dd>
   *     The key of the Purchase Option in the database. Table depends on <var>id_purchase_item</var>.
   *   </dd>
   *   <dt>
   *     string [<var>k_login_prize</var>]
   *   </dt>
   *   <dd>
   *     The key of the user's prize which can be used instead a Purchase Option to book the session.
   *   </dd>
   *   <dt>
   *     string [<var>s_contract</var>]
   *   </dt>
   *   <dd>
   *     The contract of the Purchase Option. This is only set if <var>is_contract</var> is <tt>true</tt>.
   *   </dd>
   *   <dt>
   *     string [<var>s_payment_duration</var>]
   *   </dt>
   *   <dd>
   *     Actual only for promotions with program 'membership'. The measurement unit of <var>i_payment_period</var>.
   *   </dd>
   *   <dt>
   *     string [<var>s_promotion_convert</var>]
   *   </dt>
   *   <dd>
   *     Actual only if <var>is_convert</var> is <tt>true</tt>. The title of the promotion to which the Purchase Option should be converted after expiration.
   *   </dd>
   *   <dt>
   *     string <var>s_title</var>
   *   </dt>
   *   <dd>
   *     The title.
   *   </dd>
   *   <dt>
   *     string <var>s_value</var>
   *   </dt>
   *   <dd>
   *     The unique identifier.
   *   </dd>
   * </dl>
   *
   * <tt>null</tt> if not set yet.
   *
   * @get result
   * @var array|null
   */
  public $a_purchase = null;

  /**
   * A list of sessions being booked. Keys - IDs of sessions. Values - lists of date/time when sessions are occurred.
   *
   * @get get
   * @var array|null
   */
  public $a_session = null;

  /**
   * The date/time of the session the user is booking now in MySQL format and in GMT.
   *
   * <tt>null</tt> if not set yet.
   *
   * @get get
   * @var string|null
   */
  public $dt_date_gmt = null;

  /**
   * The ID of the session which is booked.
   *
   * <tt>null</tt> if not set yet.
   *
   * @get get
   * @var string|null
   */
  public $k_class_period = null;

  /**
   * The business ID.
   *
   * <tt>null</tt> if not set yet.
   *
   * @get get
   * @var string|null
   */
  public $k_business = null;

  /**
   * WellnessLiving mode type. One of {@link WlBookModeSid} constants.
   *
   * @get get
   * @var int
   */
  public $id_mode =  WlBookModeSid::APP_FRONTEND;

  /**
   * The ID of a user who is making the book.
   *
   * <tt>null</tt> if not set yet.
   *
   * @get get
   * @var string|null
   */
  public $uid = null;
}

?>