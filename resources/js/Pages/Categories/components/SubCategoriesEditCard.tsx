import Card from "@/Components/Card";
import DangerButton from "@/Components/DangerButton";
import {TextField} from "@/Components/Forms/TextField";
import SecondaryButton from "@/Components/SecondaryButton";
import {SubCategoryCreate} from "@/types/categories/category";

interface SubCategoriesEditCardProps {
    readonly subCategories: SubCategoryCreate[];
    readonly errors: any;

    onChange: (subCategories: SubCategoryCreate[]) => void;
}
export function SubCategoriesEditCard({
    subCategories,
    errors,
    onChange,
}: SubCategoriesEditCardProps) {
    return (
        <Card
            heading="Sub-Categories"
            subheading="These are your more specific categories that products will be placed into"
        >
            <div className="mt-6 flex flex-col justify-center w-full gap-4 space-y-4">
                {subCategories.map((subCategory, index) => (
                    <div className="flex flex-col space-y-2 w-6/12">
                        <TextField
                            fullWidth
                            name={`subCategories[${index}].name`}
                            value={subCategory.name}
                            errors={
                                (errors as any)[`subCategories.${index}.name`]
                            }
                            label="Name"
                            onChange={(e: any) => {
                                const newSubCategories = [...subCategories];

                                newSubCategories[index].name = e.target.value;

                                onChange(newSubCategories);
                            }}
                        />

                        <TextField
                            fullWidth
                            name={`subCategories[${index}].description`}
                            value={subCategory.description || ""}
                            errors={
                                (errors as any)[
                                    `subCategories.${index}.description`
                                ]
                            }
                            label="Description"
                            onChange={(e: any) => {
                                const newSubCategories = [...subCategories];

                                newSubCategories[index].description =
                                    e.target.value;

                                onChange(newSubCategories);
                            }}
                        />

                        {index > 0 && (
                            <DangerButton
                                type="button"
                                onClick={() => {
                                    const newSubCategories = [...subCategories];
                                    newSubCategories.splice(index, 1);
                                    onChange(newSubCategories);
                                }}
                            >
                                Delete
                            </DangerButton>
                        )}
                    </div>
                ))}
            </div>

            <SecondaryButton
                className="mt-4"
                onClick={() => {
                    onChange([
                        ...subCategories,
                        {
                            name: "",
                            description: "",
                        } as SubCategoryCreate,
                    ]);
                }}
                type="button"
            >
                Add Sub-Category
            </SecondaryButton>
        </Card>
    );
}
