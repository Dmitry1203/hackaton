<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Настройки профиля <?php $__env->endSlot(); ?>
	 <?php $__env->slot('bodyClassName', null, []); ?> profile tasks <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 

            <div class="content teams">
                <div class="content-header">
                    <h3>Настройки профиля</h3>
                </div>
                <div class="teams-layout">

						<form
							id="team-form"
							name="team-form"
							class="create-team-form novalidate"
							action="<?php echo e(Route('personal.team.update')); ?>"
							method="POST"
							autocomplete="off"
							enctype="multipart/form-data"
						>
						<?php echo csrf_field(); ?>

                        <div class="form-inner">
                            <div class="column">
                                <h5>Основная информация</h5>
                                <div class="form-block">
                                    <div class="form-group">
                                        <label for="team" class="body-text-large">Название команды*</label>
										<input
											type="text"
											name="team"
											class="form-control"
											id="team"
											placeholder="Вставьте ссылку"
											value="<?php echo e($team[0]->team); ?>"
											data-required="1"
										>
										<?php $__errorArgs = ['team'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<div class="text-danger"><?php echo $message; ?></div>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="chat" class="body-text-large">Ссылка на чат команды</label>
										<input
											type="text"
											name="chat"
											class="form-control"
											id="chat"
											placeholder="Ссылка на чат"
											value="<?php echo e($team[0]->chat); ?>"
										>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="body-text-large">Описание команды*</label>
                                        <div class="input-group">
											<textarea
												type="text"
												name="description"
												class="form-control"
												id="description"
												placeholder="Описание команды"
												maxlength="256"
											><?php echo e($team[0]->description); ?></textarea>
											<div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <h5>Логотип команды</h5>
                                <div class="form-block">
                                    <div class="account-photo">

                                        <?php if(empty($team[0]->logo)): ?>
											<div class="preview" style="background-color: #0089D7">
		                                        <img alt="">
		                                        <div class="preview-text">
		                                            К
		                                        </div>
		                                    </div>
                                            <input type="hidden" id="logo-uploaded" name="logo-uploaded" value="0">
                                        <?php else: ?>
                                        	<div class="preview">
										    	<img src="<?php echo e(asset("storage/images/logo/".$team[0]->logo)); ?>"
										    alt="<?php echo e($team[0]->team); ?>">
										    </div>
                                            <input type="hidden" id="logo-uploaded" name="logo-uploaded" value="1">
                                        <?php endif; ?>

                                        <div class="action">
                                            <div class="custom-upload custom-upload-simple">
                                                <label>
													<input
														type="file"
														class="custom-file-input"
														id="logo"
														name="logo"
														accept="image/jpeg"
													>
                                                    <div class="custom-upload-button body-text-medium">Загрузить логотип</div>
                                                </label>
                                                <div class="error-message body-text-small"></div>
                                            </div>
                                            <div class="note body-text-small">Не больше 5 Мб</div>
                                            <div class="note body-text-small">Допустимые форматы файлов - .png, .jpg</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
	                        <button type="button"
	                            class="submit-button save-team button button__block button__filled button__large">
	                            Сохранить изменения
	                        </button>
                        </div>
                    </form>
                </div>
            </div>

        <?php echo $__env->make('personal.modal.teamUpdate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?>
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/teamEdit.blade.php ENDPATH**/ ?>