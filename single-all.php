<?php
	get_header();
	$post = get_post($_GET['id']);
?>
   
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="col-md-9">
                    <div class="tur-name-wr">
                        <div class="tur-name">
                            <h2><?=$post->post_title?></h2>
							<span><?php the_time('d.m.Y'); ?></span>
							<div class="tagpost">
                         		<?php the_tags('Теги: ', ', ', '<br />'); ?>
                         	</div>
						</div>
						
						<?php if(get_post_meta(get_the_ID(), 'featured-checkbox', true) == 'yes') : ?>
                        <div class="row tur">
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Курорт</div>
                        			<div class="col-xs-6"><?php $value1 = get_post_meta( get_the_ID(), 'tour1-name', true ); echo $value1; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Длительность</div>
                        			<div class="col-xs-6"><?php $value2 = get_post_meta( get_the_ID(), 'tour1-time', true ); echo $value2; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Стоимость</div>
                        			<div class="col-xs-6"><?php $value3 = get_post_meta( get_the_ID(), 'tour1-cost', true ); echo $value3; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Вылет</div>
                        			<div class="col-xs-6"><?php $value4 = get_post_meta( get_the_ID(), 'tour1-date', true ); echo $value4; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Проживание</div>
                        			<div class="col-xs-6"><?php $value5 = get_post_meta( get_the_ID(), 'tour1-hotel', true ); echo $value5; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Перелет</div>
                        			<div class="col-xs-6"><?php $value6 = get_post_meta( get_the_ID(), 'tour1-fly', true ); echo $value6; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Питание</div>
                        			<div class="col-xs-6"><?php $value7 = get_post_meta( get_the_ID(), 'tour1-eat', true ); echo $value7; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Трансфер</div>
                        			<div class="col-xs-6"><?php $value8 = get_post_meta( get_the_ID(), 'tour1-transfer', true ); echo $value8; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Страховка</div>
                        			<div class="col-xs-6"><?php $value9 = get_post_meta( get_the_ID(), 'tour1-strahovka', true ); echo $value9; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Виза</div>
                        			<div class="col-xs-6"><?php $value10 = get_post_meta( get_the_ID(), 'tour1-visa', true ); echo $value10; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6 col-lg-4 col-lg-offset-3">
                       			<a class="btn btn-danger btn-lg btn-block" href="<?php $value11 = get_post_meta( get_the_ID(), 'tour1-buy', true ); echo $value11; ?>" target="_blank" rel="noopener">Купить</a>
                       		</div>
                        	<div class="col-md-6 col-lg-4">
                        		<a class="btn btn-primary btn-lg btn-block" href="<?php $value12 = get_post_meta( get_the_ID(), 'tour1-another', true ); echo $value12; ?>" target="_blank" rel="noopener">Другие варианты</a>
                        	</div>
                        	<div class="col-lg-1"></div>
						</div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta(get_the_ID(), 'feat-checkbox', true) == 'yes') : ?>
                        <div class="row tur">
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Курорт</div>
                        			<div class="col-xs-6"><?php $value13 = get_post_meta( get_the_ID(), 'tour2-name', true ); echo $value13; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Длительность</div>
                        			<div class="col-xs-6"><?php $value14 = get_post_meta( get_the_ID(), 'tour2-time', true ); echo $value14; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Стоимость</div>
                        			<div class="col-xs-6"><?php $value15 = get_post_meta( get_the_ID(), 'tour2-cost', true ); echo $value15; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Вылет</div>
                        			<div class="col-xs-6"><?php $value16 = get_post_meta( get_the_ID(), 'tour2-date', true ); echo $value16; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Проживание</div>
                        			<div class="col-xs-6"><?php $value17 = get_post_meta( get_the_ID(), 'tour2-hotel', true ); echo $value17; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Перелет</div>
                        			<div class="col-xs-6"><?php $value18 = get_post_meta( get_the_ID(), 'tour2-fly', true ); echo $value18; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Питание</div>
                        			<div class="col-xs-6"><?php $value19 = get_post_meta( get_the_ID(), 'tour2-eat', true ); echo $value19; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Трансфер</div>
                        			<div class="col-xs-6"><?php $value20 = get_post_meta( get_the_ID(), 'tour2-transfer', true ); echo $value20; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Страховка</div>
                        			<div class="col-xs-6"><?php $value21 = get_post_meta( get_the_ID(), 'tour2-strahovka', true ); echo $value21; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Виза</div>
                        			<div class="col-xs-6"><?php $value22 = get_post_meta( get_the_ID(), 'tour2-visa', true ); echo $value22; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6 col-lg-4 col-lg-offset-3">
                       			<a class="btn btn-danger btn-lg btn-block" href="<?php $value23 = get_post_meta( get_the_ID(), 'tour2-buy', true ); echo $value23; ?>" target="_blank" rel="noopener">Купить</a>
                       		</div>
                        	<div class="col-md-6 col-lg-4">
                        		<a class="btn btn-primary btn-lg btn-block" href="<?php $value24 = get_post_meta( get_the_ID(), 'tour2-another', true ); echo $value24; ?>" target="_blank" rel="noopener">Другие варианты</a>
                        	</div>
                        	<div class="col-lg-1"></div>
						</div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta(get_the_ID(), 'see-checkbox', true) == 'yes') : ?>
                        <div class="row tur">
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Курорт</div>
                        			<div class="col-xs-6"><?php $value25 = get_post_meta( get_the_ID(), 'tour3-name', true ); echo $value25; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Длительность</div>
                        			<div class="col-xs-6"><?php $value26 = get_post_meta( get_the_ID(), 'tour3-time', true ); echo $value26; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Стоимость</div>
                        			<div class="col-xs-6"><?php $value27 = get_post_meta( get_the_ID(), 'tour3-cost', true ); echo $value27; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Вылет</div>
                        			<div class="col-xs-6"><?php $value28 = get_post_meta( get_the_ID(), 'tour3-date', true ); echo $value28; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Проживание</div>
                        			<div class="col-xs-6"><?php $value29 = get_post_meta( get_the_ID(), 'tour3-hotel', true ); echo $value29; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Перелет</div>
                        			<div class="col-xs-6"><?php $value30 = get_post_meta( get_the_ID(), 'tour3-fly', true ); echo $value30; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Питание</div>
                        			<div class="col-xs-6"><?php $value31 = get_post_meta( get_the_ID(), 'tour3-eat', true ); echo $value31; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Трансфер</div>
                        			<div class="col-xs-6"><?php $value32 = get_post_meta( get_the_ID(), 'tour3-transfer', true ); echo $value32; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Страховка</div>
                        			<div class="col-xs-6"><?php $value33 = get_post_meta( get_the_ID(), 'tour3-strahovka', true ); echo $value33; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Виза</div>
                        			<div class="col-xs-6"><?php $value34 = get_post_meta( get_the_ID(), 'tour3-visa', true ); echo $value34; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6 col-lg-4 col-lg-offset-3">
                       			<a class="btn btn-danger btn-lg btn-block" href="<?php $value35 = get_post_meta( get_the_ID(), 'tour3-buy', true ); echo $value35; ?>" target="_blank" rel="noopener">Купить</a>
                       		</div>
                        	<div class="col-md-6 col-lg-4">
                        		<a class="btn btn-primary btn-lg btn-block" href="<?php $value36 = get_post_meta( get_the_ID(), 'tour3-another', true ); echo $value36; ?>" target="_blank" rel="noopener">Другие варианты</a>
                        	</div>
                        	<div class="col-lg-1"></div>
						</div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta(get_the_ID(), 'featured4-checkbox', true) == 'yes') : ?>
                        <div class="row tur">
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Курорт</div>
                        			<div class="col-xs-6"><?php $value37 = get_post_meta( get_the_ID(), 'tour4-name', true ); echo $value37; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Длительность</div>
                        			<div class="col-xs-6"><?php $value38 = get_post_meta( get_the_ID(), 'tour4-time', true ); echo $value38; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Стоимость</div>
                        			<div class="col-xs-6"><?php $value39 = get_post_meta( get_the_ID(), 'tour4-cost', true ); echo $value39; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Вылет</div>
                        			<div class="col-xs-6"><?php $value40 = get_post_meta( get_the_ID(), 'tour4-date', true ); echo $value40; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Проживание</div>
                        			<div class="col-xs-6"><?php $value41 = get_post_meta( get_the_ID(), 'tour4-hotel', true ); echo $value41; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Перелет</div>
                        			<div class="col-xs-6"><?php $value42 = get_post_meta( get_the_ID(), 'tour4-fly', true ); echo $value42; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Питание</div>
                        			<div class="col-xs-6"><?php $value43 = get_post_meta( get_the_ID(), 'tour4-eat', true ); echo $value43; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Трансфер</div>
                        			<div class="col-xs-6"><?php $value44 = get_post_meta( get_the_ID(), 'tour4-transfer', true ); echo $value44; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Страховка</div>
                        			<div class="col-xs-6"><?php $value45 = get_post_meta( get_the_ID(), 'tour4-strahovka', true ); echo $value45; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Виза</div>
                        			<div class="col-xs-6"><?php $value46 = get_post_meta( get_the_ID(), 'tour4-visa', true ); echo $value46; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6 col-lg-4 col-lg-offset-3">
                       			<a class="btn btn-danger btn-lg btn-block" href="<?php $value47 = get_post_meta( get_the_ID(), 'tour4-buy', true ); echo $value47; ?>" target="_blank" rel="noopener">Купить</a>
                       		</div>
                        	<div class="col-md-6 col-lg-4">
                        		<a class="btn btn-primary btn-lg btn-block" href="<?php $value48 = get_post_meta( get_the_ID(), 'tour4-another', true ); echo $value48; ?>" target="_blank" rel="noopener">Другие варианты</a>
                        	</div>
                        	<div class="col-lg-1"></div>
						</div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta(get_the_ID(), 'feat5-checkbox', true) == 'yes') : ?>
                        <div class="row tur">
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Курорт</div>
                        			<div class="col-xs-6"><?php $value49 = get_post_meta( get_the_ID(), 'tour5-name', true ); echo $value49; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Длительность</div>
                        			<div class="col-xs-6"><?php $value50 = get_post_meta( get_the_ID(), 'tour5-time', true ); echo $value50; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Стоимость</div>
                        			<div class="col-xs-6"><?php $value51 = get_post_meta( get_the_ID(), 'tour5-cost', true ); echo $value51; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Вылет</div>
                        			<div class="col-xs-6"><?php $value52 = get_post_meta( get_the_ID(), 'tour5-date', true ); echo $value52; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Проживание</div>
                        			<div class="col-xs-6"><?php $value53 = get_post_meta( get_the_ID(), 'tour5-hotel', true ); echo $value53; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Перелет</div>
                        			<div class="col-xs-6"><?php $value54 = get_post_meta( get_the_ID(), 'tour5-fly', true ); echo $value54; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Питание</div>
                        			<div class="col-xs-6"><?php $value55 = get_post_meta( get_the_ID(), 'tour5-eat', true ); echo $value55; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Трансфер</div>
                        			<div class="col-xs-6"><?php $value56 = get_post_meta( get_the_ID(), 'tour5-transfer', true ); echo $value56; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Страховка</div>
                        			<div class="col-xs-6"><?php $value57 = get_post_meta( get_the_ID(), 'tour5-strahovka', true ); echo $value57; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Виза</div>
                        			<div class="col-xs-6"><?php $value58 = get_post_meta( get_the_ID(), 'tour5-visa', true ); echo $value58; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6 col-lg-4 col-lg-offset-3">
                       			<a class="btn btn-danger btn-lg btn-block" href="<?php $value59 = get_post_meta( get_the_ID(), 'tour5-buy', true ); echo $value59; ?>" target="_blank" rel="noopener">Купить</a>
                       		</div>
                        	<div class="col-md-6 col-lg-4">
                        		<a class="btn btn-primary btn-lg btn-block" href="<?php $value60 = get_post_meta( get_the_ID(), 'tour5-another', true ); echo $value60; ?>" target="_blank" rel="noopener">Другие варианты</a>
                        	</div>
                        	<div class="col-lg-1"></div>
						</div>
                        <?php endif; ?>
                        
                        <?php if(get_post_meta(get_the_ID(), 'see6-checkbox', true) == 'yes') : ?>
                        <div class="row tur">
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Курорт</div>
                        			<div class="col-xs-6"><?php $value61 = get_post_meta( get_the_ID(), 'tour6-name', true ); echo $value61; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Длительность</div>
                        			<div class="col-xs-6"><?php $value62 = get_post_meta( get_the_ID(), 'tour6-time', true ); echo $value62; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Стоимость</div>
                        			<div class="col-xs-6"><?php $value63 = get_post_meta( get_the_ID(), 'tour6-cost', true ); echo $value63; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Вылет</div>
                        			<div class="col-xs-6"><?php $value64 = get_post_meta( get_the_ID(), 'tour6-date', true ); echo $value64; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Проживание</div>
                        			<div class="col-xs-6"><?php $value65 = get_post_meta( get_the_ID(), 'tour6-hotel', true ); echo $value65; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Перелет</div>
                        			<div class="col-xs-6"><?php $value66 = get_post_meta( get_the_ID(), 'tour6-fly', true ); echo $value66; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Питание</div>
                        			<div class="col-xs-6"><?php $value67 = get_post_meta( get_the_ID(), 'tour6-eat', true ); echo $value67; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Трансфер</div>
                        			<div class="col-xs-6"><?php $value68 = get_post_meta( get_the_ID(), 'tour6-transfer', true ); echo $value68; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Страховка</div>
                        			<div class="col-xs-6"><?php $value69 = get_post_meta( get_the_ID(), 'tour6-strahovka', true ); echo $value69; ?></div>
                        		</div>
                        		<div class="row">
                        			<div class="col-xs-6 text-right">Виза</div>
                        			<div class="col-xs-6"><?php $value70 = get_post_meta( get_the_ID(), 'tour6-visa', true ); echo $value70; ?></div>
                        		</div>
                        	</div>
                        	<div class="col-md-6 col-lg-4 col-lg-offset-3">
                       			<a class="btn btn-danger btn-lg btn-block" href="<?php $value71 = get_post_meta( get_the_ID(), 'tour6-buy', true ); echo $value71; ?>" target="_blank" rel="noopener">Купить</a>
                       		</div>
                        	<div class="col-md-6 col-lg-4">
                        		<a class="btn btn-primary btn-lg btn-block" href="<?php $value72 = get_post_meta( get_the_ID(), 'tour6-another', true ); echo $value72; ?>" target="_blank" rel="noopener">Другие варианты</a>
                        	</div>
                        	<div class="col-lg-1"></div>
						</div>
                        <?php endif; ?>
						
						
						<?php the_content(); ?>
					</div>  
				</div>
			<?php endwhile; else : ?>
				<div class="col-md-9">
					<h1>Не найдено</h1>
					<p>Извините, но того, что Вы искали, тут нет.</p>
				</div>
			<?php endif; ?>
    
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>