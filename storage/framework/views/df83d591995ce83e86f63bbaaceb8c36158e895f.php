<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Мой профиль <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
        <div class="content account__user">
            <div class="content-header">
                <h3>Мой профиль</h3>
                <a href="<?php echo e(Route('personal.profile.edit')); ?>" class="button button__block button__filled button__medium">Редактировать профиль</a>
            </div>
            <div class="account-layout">
                <div class="account-wrapper">
                    <div class="account-icon">
						<?php if(empty(auth()->user()->avatar) ): ?>
							<img src = "/images/avatar-default.png">
						<?php else: ?>
							<img src="<?php echo e(asset("storage/images/avatars/".auth()->user()->avatar)); ?>"
							alt="<?php echo e(auth()->user()->name); ?> <?php echo e(auth()->user()->surname); ?>">
						<?php endif; ?>
                    </div>
                    <div class="account-content">

                        <h5><?php echo e(auth()->user()->name); ?> <?php echo e(auth()->user()->surname); ?></h5>

                        <div class="info-list body-text-medium">
                            <div class="info-item">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                        stroke="#111827" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M22 6L12 13L2 6" stroke="#111827" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <?php echo e(auth()->user()->email); ?>

                            </div>
                            <div class="info-item">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.0001 16.92V19.92C22.0012 20.1985 21.9441 20.4742 21.8326 20.7293C21.721 20.9845 21.5574 21.2136 21.3521 21.4019C21.1469 21.5901 20.9046 21.7335 20.6408 21.8227C20.377 21.9119 20.0974 21.9451 19.8201 21.92C16.7429 21.5856 13.7871 20.5341 11.1901 18.85C8.77388 17.3147 6.72539 15.2662 5.19006 12.85C3.50003 10.2412 2.4483 7.271 2.12006 4.18C2.09507 3.90347 2.12793 3.62476 2.21656 3.36163C2.30518 3.09849 2.44763 2.85669 2.63482 2.65162C2.82202 2.44655 3.04986 2.28271 3.30385 2.17052C3.55783 2.05834 3.8324 2.00026 4.11006 2H7.11006C7.59536 1.99523 8.06585 2.16708 8.43382 2.48353C8.80179 2.79999 9.04213 3.23945 9.11005 3.72C9.23668 4.68007 9.47151 5.62273 9.81006 6.53C9.9446 6.88793 9.97372 7.27692 9.89396 7.65088C9.81421 8.02485 9.62892 8.36811 9.36005 8.64L8.09006 9.91C9.51361 12.4135 11.5865 14.4864 14.0901 15.91L15.3601 14.64C15.6319 14.3711 15.9752 14.1859 16.3492 14.1061C16.7231 14.0263 17.1121 14.0555 17.4701 14.19C18.3773 14.5286 19.32 14.7634 20.2801 14.89C20.7658 14.9585 21.2095 15.2032 21.5266 15.5775C21.8437 15.9518 22.0122 16.4296 22.0001 16.92Z"
                                        stroke="#25282B" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <?php echo e(auth()->user()->phone); ?>

                            </div>

                            <?php if(auth()->user()->has_profile == 2): ?>

                            <div class="info-item">
                                <svg width="26" height="28" viewBox="0 0 26 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="26" height="28" fill="url(#pattern0)" />
                                    <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_565_10437"
                                                transform="translate(-0.0384615) scale(0.00210337 0.00195312)" />
                                        </pattern>
                                        <image id="image0_565_10437" width="512" height="512"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>

                                <?php echo e(auth()->user()->school); ?>

                            </div>

                            

                            <div class="info-item">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75 6V4.5H14.75V6H8.75ZM16.25 4.25V6H20.5C21.1904 6 21.75 6.55964 21.75 7.25V14.75V19.75C21.75 20.4404 21.1904 21 20.5 21H3.5C2.80964 21 2.25 20.4404 2.25 19.75V14.75V7.25C2.25 6.55964 2.80964 6 3.5 6H7.25V4.25C7.25 3.55964 7.80964 3 8.5 3H15C15.6904 3 16.25 3.55964 16.25 4.25ZM3.75 14V7.5H20.25V14H13.5V13.95C13.5 13.5634 13.1866 13.25 12.8 13.25H11.2C10.8134 13.25 10.5 13.5634 10.5 13.95V14H3.75ZM10.5 15.5H3.75V19.5H20.25V15.5H13.5V15.55C13.5 15.9366 13.1866 16.25 12.8 16.25H11.2C10.8134 16.25 10.5 15.9366 10.5 15.55V15.5Z" fill="black"/>
                                </svg>

                                <?php echo e(auth()->user()->work); ?>

                            </div>

                            <?php endif; ?>

                        </div>

                        <?php if(auth()->user()->has_profile == 2): ?>

                            <div class="account-about body-text-medium">
                                <?php echo e(auth()->user()->about_me); ?>

                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?>
<?php /**PATH C:\OSPanel\domains\smolathon\resources\views/personal/profile.blade.php ENDPATH**/ ?>