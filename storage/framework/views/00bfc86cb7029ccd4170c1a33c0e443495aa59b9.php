<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Курсы <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 

        <div class="content courses">
            <div class="content-header">
                <h3>Курсы</h3>
            </div>
            <div class="courses-layout">
                <div class="courses-list">
                    <a href="#" class="course-item complete">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс <div class="status body-text-small">Просмотрен</div>
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">75 % просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 75%;"></div>
                                        </div>
                                    </div>

                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">50 % не просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">50 % не просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item complete">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс <div class="status body-text-small">Просмотрен</div>
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">75 % просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 75%;"></div>
                                        </div>
                                    </div>

                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">50 % не просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">50 % не просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">50 % не просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="course-item">
                        <div class="course-item-inner">
                            <div class="course-item-wrapper">
                                <div class="course-item-content">
                                    <div class="course-item-info">
                                        <div class="course-item-title body-text-medium">
                                            Курс
                                        </div>
                                        <div class="couse-item-text body-text-large">
                                            Насаждения на городских улицах
                                        </div>
                                    </div>
                                    <div class="course-progress">
                                        <div class="course-progress-info body-text-medium">50 % не просмотрено</div>
                                        <div class="progress-bar">
                                            <div class="progress-bar-line" style="width: 50%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </a>
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
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/courses.blade.php ENDPATH**/ ?>