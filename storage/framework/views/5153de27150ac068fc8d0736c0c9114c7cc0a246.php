<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Задача <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 

            <div class="content task">
                <div class="content-header">
                    <h3>Задачи</h3>
                    <a href="<?php echo e(Route('personal.tasks')); ?>" class="go-back-link button button__block button__light button__medium">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 14.5L4 9.5L9 4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M20 20.5V13.5C20 12.4391 19.5786 11.4217 18.8284 10.6716C18.0783 9.92143 17.0609 9.5 16 9.5H4"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Вернуться к списку</a>
                </div>
                <div class="task-layout">
                    <div class="task-card">
                        <div class="task-card-header">
                            <h6><?php echo e($task->name); ?></h6>
                            <?php if($myTask): ?>
                            	<div class="status body-text-small">Выбрана</div>
                            <?php endif; ?>
                        </div>
                        <div class="task-text body-text-medium"><?php echo $task->text; ?></div>
                    </div>

                    

                    <?php if(!$myTask && !empty(auth()->user()->team_id)): ?>
						<div class="action">
							<form
								id="task-form"
								name="task-form"
								class="create-team-form"
								action="<?php echo e(Route('personal.task.binding')); ?>"
								method="POST"
							>
								<input
									type="hidden"
									name="id"
									id="id"
									value="<?php echo e($id); ?>"
								>
								<?php echo csrf_field(); ?>
								<button class="submit-button button button__block button__filled button__medium">Выбрать задачу</button>
							</form>
						</div>
                    <?php endif; ?>
                </div>
            </div>

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?>
<?php /**PATH C:\OSPanel\domains\smolathon\resources\views/personal/task.blade.php ENDPATH**/ ?>