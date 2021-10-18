<?php
/**
 * tribute2
 * Olamiposi
 * 22/01/2021
 * 10:16
 * CREATED WITH PhpStorm
 **/
?>
 <div class="memorial-view__right">
                                    <div class="memorial-view-cards">
                                        <div class="card-share-memorial">
                                            <div class="card-share-memorial__top">
                                                <h6 class="card-heading">Share Memorial</h6>
                                            </div>
                                            <div class="card-share-memorial__content">
                                                <p class="card-share-memorial__text">
                                                    Share memorial with Johnson’s family and friends
                                                </p>
                                                <div class="card-share-memorial__socials">
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/ig-memorial.svg" alt="instagram" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="whatsapp" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/whatsapp-memorial.svg" alt="twitter" class="tribute-details__icon"></a>
                                                    <a href="#" class="tribute-details__link"><img src="../../assets/img/facebook-memorial.svg" alt="facebook" class="tribute-details__icon"></a>
                                                </div>
                                                <div class="card-share-memorial__copy">
                                                    <a href="#" id="copy-content">{{$detail->slug}}/createtribute.com</a>
                                                    <button id="btn-copy">
                                                        <img src="../../assets/img/copy-icon.svg" alt="Copy Icon">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-small">
                                            <p class="card-small__views">{{$detail->page_views}} <span>@if ( $detail->page_views ==1)
                                       View     @else Views @endif</span></p>
                                        </div>
                                        <div class="card-small">
                                            <p class="card-small__created-by">Created By</>
                                            </p>
                                            <h5 class="card-small__creator">{{$detail->users->name}}</h5>
                                        </div>
                                    </div>
                                </div>